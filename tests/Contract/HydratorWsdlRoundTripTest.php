<?php

namespace Brightree\Tests\Contract;

use Brightree\SalesOrder\SalesOrder;
use Brightree\SalesOrder\SalesOrderItemInfo;
use Brightree\SalesOrder\SalesOrderItemPayorInfo;
use Brightree\Services\BaseService;
use Brightree\Services\SalesOrderService;
use Brightree\Soap\ResponseHydrator;
use Brightree\Tests\Support\RecordingSoapClient;
use Brightree\Tests\TestCase;
use stdClass;

/**
 * The fetch, edit, send round trip against Brightree's own schema.
 *
 * HydratorRoundTripTest proves the mechanism on a fixture WSDL, which is what
 * lets it run on any checkout. This proves it on the WSDL the workflow
 * actually runs against, with the shipped DTOs and Brightree's own ArrayOf*
 * wrappers — the collection shapes, the nesting depth and the decimal handling
 * are all Brightree's here, not this suite's.
 *
 * Every response below is decoded by ext-soap from XML, so the stdClass graphs
 * the hydrator sees are the ones Brightree would have produced.
 */
final class HydratorWsdlRoundTripTest extends TestCase {
  private const SERVICE_NS = 'http://www.brightree.com/external/SalesOrderService';

  private const RESPONSE_NS = 'http://schemas.datacontract.org/2004/07/Brightree.Common.CanonicalObjects';

  private const ORDER_NS = 'http://schemas.datacontract.org/2004/07/Brightree.ExternalAPI.CanonicalObjects.OrderEntry';

  /**
   * The asymmetry the hydrator exists to absorb, stated against the real
   * schema: the same collection with one row and with several decodes to two
   * different PHP shapes, and both have to become a list.
   */
  public function testACollectionOfOneAndOfManyBothHydrateToLists(): void {
    $one = $this->hydrateOrder($this->item('A4253', [557]));
    $many = $this->hydrateOrder($this->item('A4253', [557, 102]) . $this->item('E0601', [557]));

    $this->assertCount(1, $one->SalesOrderItems);
    $this->assertCount(1, $one->SalesOrderItems[0]->Payors);

    $this->assertCount(2, $many->SalesOrderItems);
    $this->assertCount(2, $many->SalesOrderItems[0]->Payors);
    $this->assertCount(1, $many->SalesOrderItems[1]->Payors);
  }

  /**
   * Three wrappers deep, all of them Brightree's: SalesOrder ->
   * SalesOrderItems -> SalesOrderItemInfo -> Payors ->
   * SalesOrderItemPayorInfo.
   */
  public function testAResponseNestedThreeCollectionsDeepHydratesAllTheWayDown(): void {
    $order = $this->hydrateOrder($this->item('A4253', [557, 102]));

    $this->assertSame(555, $order->BrightreeID);

    $item = $order->SalesOrderItems[0];
    $this->assertInstanceOf(SalesOrderItemInfo::class, $item);
    $this->assertSame('A4253', $item->ProcCode);
    $this->assertSame(30.0, $item->ChargeAmt, 'xs:decimal arrives as a string and the DTO declares float.');
    $this->assertSame(12.5, $item->AllowAmt);

    $this->assertContainsOnlyInstancesOf(SalesOrderItemPayorInfo::class, $item->Payors);
    $this->assertSame([557, 102], array_column($item->Payors, 'PayorKey'));
    $this->assertSame(['P557', 'P102'], array_column($item->Payors, 'PayorName'));
  }

  public function testAnEmptyCollectionHydratesToAnEmptyList(): void {
    $order = $this->hydrateOrder('');

    $this->assertSame([], $order->SalesOrderItems);
    $this->assertSame(555, $order->BrightreeID, 'The rest of the order still has to come across.');
  }

  /**
   * The workflow from the ticket, whole: fetch a line item, reprice it, and
   * hand it to the typed wrapper that previously rejected a stdClass. What
   * goes out must carry the fields nobody touched and nothing else.
   */
  public function testARepricedLineItemGoesBackThroughTheTypedWrapper(): void {
    $order = $this->hydrateOrder($this->item('A4253', [557, 102]));
    $item = $order->SalesOrderItems[0];

    $item->ChargeAmt = 45.00;
    $item->Qty = 3;

    $service = new SalesOrderService([]);
    $service->wsdl_path = $this->wsdl('SalesOrderService');

    $xml = $this->capture(
        $service,
        static fn(BaseService $s): mixed => $s->salesOrderUpdateItem(555, $item->BrightreeDetailID, $item)
    );

    // The edits.
    $this->assertSame(['45'], $this->textContentsOf($xml, 'ChargeAmt'));
    $this->assertSame(['3'], $this->textContentsOf($xml, 'Qty'));

    // The fields nobody touched, carried over from the fetch.
    $this->assertSame(['A4253'], $this->textContentsOf($xml, 'ProcCode'));
    $this->assertSame(['12.5'], $this->textContentsOf($xml, 'AllowAmt'));
    // Twice over: the operation's own BrightreeDetailID argument, which the
    // hydrated item is what supplies, and the one on the item itself.
    $this->assertSame(['901', '901'], $this->textContentsOf($xml, 'BrightreeDetailID'));

    // The nested collection, re-encoded as the repeating element it came from.
    $this->assertSame(2, $this->elementCount($xml, 'SalesOrderItemPayorInfo'));
    $this->assertSame(['557', '102'], $this->textContentsOf($xml, 'PayorKey'));

    // And nothing the response never mentioned.
    $this->assertStringNotContainsString('xsi:nil', $xml, 'A hydrated DTO put a nil back on the wire.');
    $this->assertSame(0, $this->elementCount($xml, 'ItemID'), 'ItemID was not in the response and must not be sent.');
    $this->assertSame(0, $this->elementCount($xml, 'DiagnosisCodes'), 'An untouched collection must not be sent as an empty element.');
  }

  /**
   * A whole order, fetched and sent straight back with one field changed. This
   * is the SalesOrderUpdate half of the ticket, where the payload is the full
   * ~50-field graph rather than one line item.
   */
  public function testAWholeOrderGoesBackThroughSalesOrderUpdate(): void {
    $order = $this->hydrateOrder($this->item('A4253', [557]) . $this->item('E0601', [102]));
    $order->ExternalID = 'ORDER-1';

    $service = new SalesOrderService([]);
    $service->wsdl_path = $this->wsdl('SalesOrderService');

    $xml = $this->capture(
        $service,
        static fn(BaseService $s): mixed => $s->salesOrderUpdate(555, $order)
    );

    $this->assertSame(2, $this->elementCount($xml, 'SalesOrderItemInfo'), 'Both line items must survive the round trip.');
    $this->assertSame(['A4253', 'E0601'], $this->textContentsOf($xml, 'ProcCode'));
    $this->assertSame(['ORDER-1'], $this->textContentsOf($xml, 'ExternalID'));
    $this->assertStringNotContainsString('xsi:nil', $xml);

    // The constructor-built branches the response never touched stay out of
    // the request entirely rather than going back as empty elements.
    $this->assertSame(0, $this->elementCount($xml, 'BrightShip'));
    $this->assertSame(0, $this->elementCount($xml, 'DeliveryInfo'));
  }

  /**
   * Response types are supersets of request types on Brightree's own schema
   * too. The extra field is reported, not raised.
   */
  public function testAResponseFieldTheDtoDoesNotDeclareIsReportedRatherThanThrown(): void {
    $decoded = $this->fetch($this->item('A4253', [557]));

    // Stand in for a field a future Brightree release returns and does not
    // accept. Injected after decoding because the current schema has none.
    $decoded->SalesOrderItems->SalesOrderItemInfo->ServerOnlyField = 'from the service';

    $order = ResponseHydrator::hydrate(SalesOrder::class, $decoded, $skipped);

    $this->assertSame(['SalesOrder.SalesOrderItems[0].ServerOnlyField'], $skipped);
    $this->assertSame('A4253', $order->SalesOrderItems[0]->ProcCode, 'The rest of the item still has to come across.');
  }

  /**
   * With SOAP_SINGLE_ELEMENT_ARRAYS a one-row collection decodes to a list
   * rather than a bare object. It is worth knowing this option exists, and
   * worth knowing it does not remove the need for the hydrator: the empty
   * collection still arrives as a wrapper with no children either way.
   */
  public function testSingleElementArraysChangesTheDecodedShapeButNotTheResult(): void {
    $default = $this->fetch($this->item('A4253', [557]));
    $listed = $this->fetch($this->item('A4253', [557]), ['features' => SOAP_SINGLE_ELEMENT_ARRAYS]);

    $this->assertIsObject($default->SalesOrderItems->SalesOrderItemInfo, 'By default ext-soap collapses a one-row collection to an object.');
    $this->assertIsArray($listed->SalesOrderItems->SalesOrderItemInfo, 'SOAP_SINGLE_ELEMENT_ARRAYS keeps it a list.');

    $this->assertEquals(
        ResponseHydrator::hydrate(SalesOrder::class, $default),
        ResponseHydrator::hydrate(SalesOrder::class, $listed),
        'The hydrator has to flatten that difference away.'
    );

    // The empty case is not covered by the option, which is why the hydrator
    // still has to handle it rather than the option being enough on its own.
    $empty = $this->fetch('', ['features' => SOAP_SINGLE_ELEMENT_ARRAYS]);
    $this->assertSame([], get_object_vars($empty->SalesOrderItems));
  }

  // ------------------------------------------------------------------ plumbing

  private function hydrateOrder(string $items): SalesOrder {
    $order = ResponseHydrator::hydrate(SalesOrder::class, $this->fetch($items), $skipped);

    $this->assertSame([], $skipped, 'Nothing in this response should have been dropped.');

    return $order;
  }

  /**
   * Decode a SalesOrderFetchByBrightreeID response through the real ext-soap
   * decoder and return the SalesOrder node a caller would hydrate.
   *
   * @param array<string, mixed> $options
   */
  private function fetch(string $items, array $options = []): stdClass {
    $client = new RecordingSoapClient($this->wsdl('SalesOrderService'), $options + ['cache_wsdl' => WSDL_CACHE_MEMORY]);
    $client->response = $this->envelope($items);

    /** @var object $response */
    $response = $client->SalesOrderFetchByBrightreeID(['BrightreeID' => 555]);
    $order = $response->SalesOrderFetchByBrightreeIDResult->Items->SalesOrder;

    return is_array($order) ? $order[0] : $order;
  }

  /**
   * One SalesOrderItemInfo, with a payor row per key.
   *
   * @param int[] $payorKeys
   */
  private function item(string $procCode, array $payorKeys): string {
    $payors = '';

    foreach ($payorKeys as $key) {
      $payors .= '<b:SalesOrderItemPayorInfo>'
      . '<b:PayorKey>' . $key . '</b:PayorKey>'
      . '<b:PayorName>P' . $key . '</b:PayorName>'
      . '</b:SalesOrderItemPayorInfo>';
    }

    return '<b:SalesOrderItemInfo>'
    . '<b:AllowAmt>12.50</b:AllowAmt>'
    . '<b:BrightreeDetailID>901</b:BrightreeDetailID>'
    . '<b:ChargeAmt>30.00</b:ChargeAmt>'
    . '<b:Payors>' . $payors . '</b:Payors>'
    . '<b:ProcCode>' . $procCode . '</b:ProcCode>'
    . '<b:Qty>1</b:Qty>'
    . '</b:SalesOrderItemInfo>';
  }

  private function envelope(string $items): string {
    return '<?xml version="1.0" encoding="utf-8"?>'
    . '<s:Envelope xmlns:s="http://schemas.xmlsoap.org/soap/envelope/"><s:Body>'
    . '<SalesOrderFetchByBrightreeIDResponse xmlns="' . self::SERVICE_NS . '">'
    . '<SalesOrderFetchByBrightreeIDResult xmlns:a="' . self::RESPONSE_NS . '" xmlns:b="' . self::ORDER_NS . '">'
    . '<a:Success>true</a:Success>'
    . '<a:Items><b:SalesOrder>'
    . '<b:BrightreeID>555</b:BrightreeID>'
    . '<b:SalesOrderItems>' . $items . '</b:SalesOrderItems>'
    . '</b:SalesOrder></a:Items>'
    . '</SalesOrderFetchByBrightreeIDResult>'
    . '</SalesOrderFetchByBrightreeIDResponse></s:Body></s:Envelope>';
  }
}
