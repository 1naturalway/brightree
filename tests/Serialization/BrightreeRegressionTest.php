<?php

namespace Brightree\Tests\Serialization;

use Brightree\ApiMessageServices\ICDCodeInfo;
use Brightree\Enums\QMBStatus;
use Brightree\Patient\Patient;
use Brightree\SalesOrder\SalesOrder;
use Brightree\SalesOrder\SalesOrderItemInfo;
use Brightree\Services\BaseService;
use Brightree\Services\DocumentManagementService;
use Brightree\Services\PatientService;
use Brightree\Services\SalesOrderService;
use Brightree\Tests\TestCase;

/**
 * One test per serialisation bug that has actually been shipped.
 *
 * These run against the real WSDLs, because every one of them was a
 * disagreement between what the DTOs looked like in PHP and what Brightree's
 * schema said. Against a fixture they would all pass. None of them failed
 * loudly at the time: the request went out, the server accepted it, and the
 * data was simply not there.
 */
final class BrightreeRegressionTest extends TestCase {
  private function salesOrderService(): SalesOrderService {
    $service = new SalesOrderService([]);
    $service->wsdl_path = $this->wsdl('SalesOrderService');

    return $service;
  }

  private function documentService(): DocumentManagementService {
    $service = new DocumentManagementService([]);
    $service->wsdl_path = $this->wsdl('DocumentManagementService');

    return $service;
  }

  private function patientService(): PatientService {
    $service = new PatientService([]);
    $service->wsdl_path = $this->wsdl('patientservice');

    return $service;
  }

  /**
   * A second line item used to vanish: the item list was handed over with
   * non-sequential keys and ext-soap emitted one element, or none.
   */
  public function testTwoSalesOrderItemsBothReachTheWire(): void {
    $order = new SalesOrder();
    $order->setExternalID('ORDER-1');
    $order->addSalesOrderItem($this->item('A4253'));
    $order->addSalesOrderItem($this->item('E0601'));

    $xml = $this->capture(
        $this->salesOrderService(),
        static fn(BaseService $s): mixed => $s->custom('SalesOrderCreate', ['SalesOrder' => $order])
    );

    $items = $this->document($xml)->getElementsByTagNameNS('*', 'SalesOrderItems');
    $this->assertSame(1, $items->length, 'Expected exactly one SalesOrderItems collection.');
    $this->assertSame(
        2,
        $items->item(0)->getElementsByTagNameNS('*', 'SalesOrderItemInfo')->length,
        'A sales order with two line items must send two SalesOrderItemInfo nodes.'
    );
    $this->assertSame(['A4253', 'E0601'], $this->textContentsOf($xml, 'ItemID'));
  }

  /**
   * DiagnosisCodes serialised as an empty element, so the diagnosis a caller
   * had attached to the line item never arrived and the claim was denied.
   */
  public function testDiagnosisCodesOnALineItemAreNotLost(): void {
    $item = $this->item('E0601');
    $item->addDiagnosisCode((new ICDCodeInfo())->setICDCode('G47.33')->setSequence(1));

    $order = new SalesOrder();
    $order->setExternalID('ORDER-2');
    $order->addSalesOrderItem($item);

    $xml = $this->capture(
        $this->salesOrderService(),
        static fn(BaseService $s): mixed => $s->custom('SalesOrderCreate', ['SalesOrder' => $order])
    );

    $codes = $this->document($xml)->getElementsByTagNameNS('*', 'DiagnosisCodes');

    $this->assertSame(1, $codes->length, 'The DiagnosisCodes collection is missing entirely.');
    $this->assertSame(
        1,
        $codes->item(0)->getElementsByTagNameNS('*', 'ICDCodeInfo')->length,
        'DiagnosisCodes was emitted empty, which is how the diagnosis used to be dropped.'
    );
    $this->assertSame(['G47.33'], $this->textContentsOf($xml, 'ICDCode'));
  }

  /**
   * The DTOs build their nested objects eagerly, so an unpruned minimal order
   * carried hundreds of nils — and against a WCF endpoint a nil is an
   * instruction to blank the field.
   */
  public function testAMinimalSalesOrderCreateCarriesNoNils(): void {
    $order = new SalesOrder();
    $order->setExternalID('ORDER-3');
    $order->addSalesOrderItem($this->item('A4253'));

    $xml = $this->capture(
        $this->salesOrderService(),
        static fn(BaseService $s): mixed => $s->custom('SalesOrderCreate', ['SalesOrder' => $order])
    );

    $this->assertSame(
        0,
        substr_count($xml, 'xsi:nil="true"'),
        'A minimal SalesOrderCreate must send nothing but the two fields that were set; '
        . 'every nil in this envelope is a field the server would blank.'
    );
    $this->assertSame(['ORDER-3'], $this->textContentsOf($xml, 'ExternalID'));
    $this->assertSame(['A4253'], $this->textContentsOf($xml, 'ItemID'));
  }

  /**
   * An enum case has to leave as the bare string the restricted type expects.
   */
  public function testAnEnumTypedPropertySerialisesAsThePlainString(): void {
    $order = new SalesOrder();
    $order->setExternalID('ORDER-4');
    $order->setQMBStatus(QMBStatus::Active);

    $xml = $this->capture(
        $this->salesOrderService(),
        static fn(BaseService $s): mixed => $s->custom('SalesOrderCreate', ['SalesOrder' => $order])
    );

    $this->assertSame(['Active'], $this->textContentsOf($xml, 'QMBStatus'));
  }

  /**
   * A property bag handed over as a plain associative array serialised to an
   * empty <PropertyBag/>, so documents were stored with no properties at all
   * and could not be found again.
   */
  public function testAPropertyBagReachesTheWireAsKeyValueNodes(): void {
    $xml = $this->capture(
        $this->documentService(),
        static fn(BaseService $s): mixed => $s->storeDocument(1, 2, [101 => 'Smith'], false, 'x')
    );

    $bag = $this->document($xml)->getElementsByTagNameNS('*', 'PropertyBag');

    $this->assertSame(1, $bag->length, 'The PropertyBag element is missing.');
    $this->assertSame(
        1,
        $bag->item(0)->getElementsByTagNameNS('*', 'KeyValueOfintstring')->length,
        'PropertyBag was emitted empty; the document would be stored with no properties.'
    );
    $this->assertSame(['101'], $this->textContentsOf($xml, 'Key'));
    $this->assertSame(['Smith'], $this->textContentsOf($xml, 'Value'));
  }

  /**
   * Contents is base64Binary, so ext-soap encodes it. Encoding first stored the
   * document twice-wrapped and it came back as gibberish.
   */
  public function testDocumentContentsAreBase64EncodedExactlyOnce(): void {
    $raw = "%PDF-1.7\n\x00\x01\x02\xfe\xff not text \xc3\x28";

    $xml = $this->capture(
        $this->documentService(),
        static fn(BaseService $s): mixed => $s->storeDocument(1, 2, [101 => 'Smith'], false, $raw)
    );

    $contents = $this->textContentsOf($xml, 'Contents');

    $this->assertCount(1, $contents);
    $this->assertSame($raw, base64_decode($contents[0], true), 'Contents did not round-trip; it was encoded twice.');
  }

  public function testPatientUpdateSendsBothItsParameters(): void {
    $patient = new Patient();
    $patient->PatientGeneralInfo->Name->First = 'Ada';
    $patient->PatientGeneralInfo->Name->Last = 'Lovelace';

    $xml = $this->capture(
        $this->patientService(),
        static fn(BaseService $s): mixed => $s->custom('PatientUpdate', ['BrightreeID' => 4321, 'Patient' => $patient])
    );

    $this->assertSame(['4321'], $this->textContentsOf($xml, 'BrightreeID'));
    $this->assertSame(1, $this->elementCount($xml, 'Patient'));
    $this->assertSame(['Ada'], $this->textContentsOf($xml, 'First'));
    $this->assertSame(['Lovelace'], $this->textContentsOf($xml, 'Last'));
    $this->assertSame(0, substr_count($xml, 'xsi:nil="true"'), 'A two-field patient update should blank nothing.');
  }

  public function testPatientUpdateThroughTheWrapperMatchesTheHandBuiltCall(): void {
    $patient = new Patient();
    $patient->PatientGeneralInfo->Name->First = 'Ada';

    $service = $this->patientService();
    $xml = $this->capture($service, static fn(BaseService $s): mixed => $s->patientUpdate(4321, $patient));

    $this->assertSame(['4321'], $this->textContentsOf($xml, 'BrightreeID'));
    $this->assertSame(['Ada'], $this->textContentsOf($xml, 'First'));
  }

  private function item(string $itemId): SalesOrderItemInfo {
    $item = new SalesOrderItemInfo();
    $item->ItemID = $itemId;

    return $item;
  }
}
