<?php

namespace Brightree\Tests\Soap;

use Brightree\SalesOrder\SalesOrder;
use Brightree\SalesOrder\SalesOrderItemInfo;
use Brightree\Soap\ResponseHydrator;
use Brightree\Tests\Support\Dto\Child;
use Brightree\Tests\Support\Dto\Item;
use Brightree\Tests\Support\Dto\Recursive;
use Brightree\Tests\Support\Dto\Tag;
use Brightree\Tests\Support\Dto\Thing;
use Brightree\Tests\Support\Kind;
use Brightree\Tests\TestCase;
use RuntimeException;
use stdClass;

/**
 * What the hydrator promises, stated against hand-built response shapes.
 *
 * These are unit tests: the response objects here are written by hand in the
 * shapes ext-soap produces. That those really are the shapes ext-soap
 * produces, and that a hydrated DTO re-encodes to the request it came from,
 * is the job of HydratorRoundTripTest.
 */
final class ResponseHydratorTest extends TestCase {
  public function testAScalarIsCopiedOntoTheDto(): void {
    $thing = ResponseHydrator::hydrate(Thing::class, (object) ['Name' => 'kept', 'Count' => 7]);

    $this->assertSame('kept', $thing->Name);
    $this->assertSame(7, $thing->Count);
  }

  /**
   * The non-negotiable one. RequestPruner omits an unset property and emits
   * xsi:nil for one that is present and null, and against a WCF endpoint those
   * mean opposite things. Writing null for a property the response never
   * mentioned would blank the field on the next update.
   */
  public function testAPropertyAbsentFromTheResponseKeepsTheDtoDefault(): void {
    $thing = ResponseHydrator::hydrate(Thing::class, (object) ['Name' => 'kept']);

    $this->assertNull($thing->Count, 'Count was absent from the response and must keep its default.');
    $this->assertSame([], $thing->Items, 'Items was absent from the response and must keep its default.');
    $this->assertInstanceOf(Child::class, $thing->Child, 'Child was absent and must keep the instance the constructor built.');
    $this->assertNull($thing->Child->Inner);
  }

  /**
   * An element carrying xsi:nil decodes to a property that is present and
   * null. The field is already null server-side, so there is nothing to write
   * back; assigning it would only put the nil into the next request.
   */
  public function testANullFromTheWireIsTreatedAsAnAbsence(): void {
    $hydrated = ResponseHydrator::hydrate(Thing::class, (object) ['Name' => null, 'Count' => 7]);

    $this->assertNull($hydrated->Name);
    $this->assertSame(7, $hydrated->Count);
  }

  public function testFalseAndZeroAndTheEmptyStringAreRealValues(): void {
    $thing = ResponseHydrator::hydrate(Thing::class, (object) ['Flag' => false, 'Count' => 0, 'Name' => '']);

    $this->assertFalse($thing->Flag);
    $this->assertSame(0, $thing->Count);
    $this->assertSame('', $thing->Name);
  }

  // ------------------------------------------------------------ collections

  public function testACollectionOfSeveralItemsHydratesToAListOfThatLength(): void {
    $thing = ResponseHydrator::hydrate(Thing::class, (object) [
      'Items' => (object) ['Item' => [$this->item(1, 'one'), $this->item(2, 'two'), $this->item(3, 'three')]],
    ]);

    $this->assertCount(3, $thing->Items);
    $this->assertContainsOnlyInstancesOf(Item::class, $thing->Items);
    $this->assertSame(['one', 'two', 'three'], array_column($thing->Items, 'Label'));
  }

  /**
   * ext-soap returns a single object rather than a one-element array when a
   * repeated element occurs once. Absorbing that here is the whole point: no
   * consumer should have to write the is_array() guard.
   */
  public function testACollectionOfOneItemHydratesToAListOfOne(): void {
    $thing = ResponseHydrator::hydrate(Thing::class, (object) [
      'Items' => (object) ['Item' => $this->item(1, 'only')],
    ]);

    $this->assertCount(1, $thing->Items);
    $this->assertInstanceOf(Item::class, $thing->Items[0]);
    $this->assertSame('only', $thing->Items[0]->Label);
  }

  /**
   * Brightree sends the wrapper element with no children at all for an empty
   * collection.
   */
  public function testAnEmptyCollectionWrapperHydratesToAnEmptyList(): void {
    $thing = ResponseHydrator::hydrate(Thing::class, (object) ['Items' => new stdClass()]);

    $this->assertSame([], $thing->Items);
  }

  /**
   * With SOAP_SINGLE_ELEMENT_ARRAYS the inner value is already a list, and a
   * hand-built payload may be one too.
   */
  public function testACollectionAlreadyShapedAsAListIsTakenAsIs(): void {
    $thing = ResponseHydrator::hydrate(Thing::class, (object) [
      'Items' => [$this->item(1, 'one'), $this->item(2, 'two')],
    ]);

    $this->assertCount(2, $thing->Items);
    $this->assertSame(['one', 'two'], array_column($thing->Items, 'Label'));
  }

  public function testTheHydratedListIsPackedSoTheEncoderCanSerialiseIt(): void {
    $thing = ResponseHydrator::hydrate(Thing::class, (object) [
      'Items' => (object) ['Item' => [3 => $this->item(1, 'one'), 9 => $this->item(2, 'two')]],
    ]);

    $this->assertSame([0, 1], array_keys($thing->Items), 'A gap in the keys costs ext-soap the whole collection.');
  }

  public function testANilEntryInsideACollectionIsDropped(): void {
    $thing = ResponseHydrator::hydrate(Thing::class, (object) [
      'Items' => (object) ['Item' => [$this->item(1, 'one'), null, $this->item(2, 'two')]],
    ]);

    $this->assertCount(2, $thing->Items);
    $this->assertSame([0, 1], array_keys($thing->Items));
  }

  // --------------------------------------------------------------- recursion

  public function testANestedObjectHydratesIntoWhatThePropertyDeclares(): void {
    $thing = ResponseHydrator::hydrate(Thing::class, (object) [
      'Child' => (object) ['Inner' => 'deep'],
    ]);

    $this->assertInstanceOf(Child::class, $thing->Child);
    $this->assertSame('deep', $thing->Child->Inner);
  }

  public function testAResponseNestedFourLevelsDeepHydratesAllTheWayDown(): void {
    $item = $this->item(1, 'one');
    $item->Tags = (object) ['Tag' => [(object) ['Name' => 'red', 'Weight' => '1.5'], (object) ['Name' => 'blue']]];

    $thing = ResponseHydrator::hydrate(Thing::class, (object) ['Items' => (object) ['Item' => $item]]);

    $this->assertCount(1, $thing->Items);
    $this->assertCount(2, $thing->Items[0]->Tags);
    $this->assertContainsOnlyInstancesOf(Tag::class, $thing->Items[0]->Tags);
    $this->assertSame('red', $thing->Items[0]->Tags[0]->Name);
    $this->assertSame(1.5, $thing->Items[0]->Tags[0]->Weight);
    $this->assertNull($thing->Items[0]->Tags[1]->Weight, 'Weight was absent on the second tag.');
  }

  // ------------------------------------------------------------------ typing

  /**
   * ext-soap decodes xs:decimal to a string to preserve precision, while every
   * Brightree money field is declared float.
   */
  public function testADecimalStringIsCoercedToTheDeclaredFloat(): void {
    $thing = ResponseHydrator::hydrate(Thing::class, (object) [
      'Items' => (object) ['Item' => (object) ['Amount' => '12.50']],
    ]);

    $this->assertSame(12.5, $thing->Items[0]->Amount);
  }

  public function testAnEnumValueFromTheWireBecomesTheCase(): void {
    $thing = ResponseHydrator::hydrate(Thing::class, (object) ['Kind' => 'Alpha', 'StrictKind' => 'Beta']);

    $this->assertSame(Kind::Alpha, $thing->Kind);
    $this->assertSame(Kind::Beta, $thing->StrictKind);
  }

  /**
   * A value the enum does not know is reported rather than raised: the service
   * gaining a case must not fail a call that never touched that field.
   */
  public function testAnUnknownEnumValueIsReportedAndLeavesTheDefault(): void {
    $thing = ResponseHydrator::hydrate(Thing::class, (object) ['StrictKind' => 'Gamma', 'Name' => 'kept'], $skipped);

    $this->assertNull($thing->StrictKind);
    $this->assertSame('kept', $thing->Name, 'One unconvertible field must not cost the rest of the object.');
    $this->assertSame(['Thing.StrictKind'], $skipped);
  }

  /**
   * The union the hand-written DTOs use has somewhere to put an unknown value,
   * so it keeps it and the round trip stays lossless.
   */
  public function testAnUnknownValueOnAUnionKeepsTheRawString(): void {
    $thing = ResponseHydrator::hydrate(Thing::class, (object) ['Kind' => 'Gamma'], $skipped);

    $this->assertSame('Gamma', $thing->Kind);
    $this->assertSame([], $skipped);
  }

  // ------------------------------------------------------- unknown properties

  public function testAPropertyTheDtoDoesNotDeclareIsReportedAndDoesNotThrow(): void {
    $thing = ResponseHydrator::hydrate(Thing::class, (object) ['Name' => 'kept', 'ServerOnly' => 'ignored'], $skipped);

    $this->assertSame('kept', $thing->Name);
    $this->assertFalse(property_exists($thing, 'ServerOnly'));
    $this->assertSame(['Thing.ServerOnly'], $skipped);
  }

  public function testAnUnknownPropertyIsReportedWithThePathItWasFoundAt(): void {
    $item = $this->item(1, 'one');
    $item->ServerNote = 'set by the service';

    ResponseHydrator::hydrate(Thing::class, (object) ['Items' => (object) ['Item' => $item]], $skipped);

    $this->assertSame(['Thing.Items[0].ServerNote'], $skipped);
  }

  public function testACleanResponseReportsNothingSkipped(): void {
    ResponseHydrator::hydrate(Thing::class, (object) ['Name' => 'kept'], $skipped);

    $this->assertSame([], $skipped);
  }

  // ----------------------------------------------------------- hydrateMany()

  public function testHydrateManyTakesAWrapperAndReturnsAList(): void {
    $items = ResponseHydrator::hydrateMany(Item::class, (object) ['Item' => [$this->item(1, 'one'), $this->item(2, 'two')]]);

    $this->assertCount(2, $items);
    $this->assertContainsOnlyInstancesOf(Item::class, $items);
  }

  public function testHydrateManyReturnsAListOfOneForASingleObject(): void {
    $items = ResponseHydrator::hydrateMany(Item::class, (object) ['Item' => $this->item(1, 'only')]);

    $this->assertCount(1, $items);
    $this->assertSame('only', $items[0]->Label);
  }

  /**
   * A record with a single populated field looks exactly like a wrapper around
   * one entry. The item type's own fields are what tell them apart.
   */
  public function testHydrateManyTreatsASingleFieldRecordAsOneElementNotAWrapper(): void {
    $items = ResponseHydrator::hydrateMany(Item::class, (object) ['Label' => 'lonely'], $skipped);

    $this->assertCount(1, $items);
    $this->assertInstanceOf(Item::class, $items[0]);
    $this->assertSame('lonely', $items[0]->Label);
    $this->assertSame([], $skipped);
  }

  public function testHydrateManyReturnsAnEmptyListForAnEmptyWrapper(): void {
    $this->assertSame([], ResponseHydrator::hydrateMany(Item::class, new stdClass()));
  }

  // ------------------------------------------------------- real Brightree DTOs

  /**
   * The workflow the hydrator exists for, against the shipped DTOs rather than
   * the fixture ones: fetch a sales order, reprice a line, send it back.
   */
  public function testASalesOrderResponseHydratesIntoTheShippedDtos(): void {
    $response = (object) [
      'BrightreeID' => 555,
      'SalesOrderItems' => (object) [
        'SalesOrderItemInfo' => (object) [
          'BrightreeDetailID' => 901,
          'ProcCode' => 'A4253',
          'ChargeAmt' => '30.00',
          'AllowAmt' => '12.50',
          'Qty' => 1,
          'Payors' => (object) [
            'SalesOrderItemPayorInfo' => [
              (object) ['PayorKey' => 557, 'PayorName' => 'Primary'],
              (object) ['PayorKey' => 102, 'PayorName' => 'Secondary'],
            ],
          ],
        ],
      ],
    ];

    $order = ResponseHydrator::hydrate(SalesOrder::class, $response, $skipped);

    $this->assertSame([], $skipped);
    $this->assertSame(555, $order->BrightreeID);
    $this->assertCount(1, $order->SalesOrderItems);

    $item = $order->SalesOrderItems[0];
    $this->assertInstanceOf(SalesOrderItemInfo::class, $item);
    $this->assertSame('A4253', $item->ProcCode);
    $this->assertSame(30.0, $item->ChargeAmt);
    $this->assertSame(12.5, $item->AllowAmt);
    $this->assertCount(2, $item->Payors);
    $this->assertSame([557, 102], array_column($item->Payors, 'PayorKey'));

    // The parts of the graph the response never mentioned are still the ones
    // the constructor built, so a caller can keep assigning through them.
    $this->assertSame([], $order->ShippingTrackingInfos);
    $order->DeliveryInfo->Address->City = 'Dayton';
    $this->assertSame('Dayton', $order->DeliveryInfo->Address->City);
  }

  // ------------------------------------------------------------------ guards

  public function testHydratingIntoAClassThatDoesNotExistRaises(): void {
    $this->expectException(RuntimeException::class);
    $this->expectExceptionMessage('no such class');

    /** @phpstan-ignore-next-line intentionally bogus */
    ResponseHydrator::hydrate('Brightree\\Nope\\NotAClass', new stdClass());
  }

  public function testAGraphDeeperThanTheCapRaisesRatherThanTruncating(): void {
    $deep = (object) ['Inner' => 'bottom'];

    for ($i = 0; $i < 70; $i++) {
      $deep = (object) ['Next' => $deep];
    }

    $this->expectException(RuntimeException::class);
    $this->expectExceptionMessage('nests deeper than');

    ResponseHydrator::hydrate(Recursive::class, $deep);
  }

  private function item(int $id, string $label): stdClass {
    return (object) ['Id' => $id, 'Label' => $label];
  }
}
