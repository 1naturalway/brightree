<?php

namespace Brightree\Tests\Serialization;

use Brightree\Services\BaseService;
use Brightree\Tests\Support\Kind;
use Brightree\Tests\TestCase;
use stdClass;

/**
 * Checks the pruner's promises against the encoder that actually has to honour
 * them.
 *
 * RequestPruner's unit tests say what the pruned payload looks like. These say
 * what ext-soap then puts on the wire, which is the part that matters and the
 * part a unit test cannot assert. The contract is tests/Fixtures/
 * encoder-contract.wsdl: generic, written for this suite, nothing proprietary
 * in it.
 */
final class EncoderContractTest extends TestCase {
  private function service(): BaseService {
    $service = new BaseService([]);
    $service->wsdl_path = $this->fixtureWsdl('encoder-contract');

    return $service;
  }

  /**
   * Encode one Thing and return the request XML.
   */
  private function echo(object $thing, bool $prune = true): string {
    $service = $this->service();
    $service->prune = $prune;

    return $this->capture($service, static fn(BaseService $s): mixed => $s->custom('Echo', ['thing' => $thing]));
  }

  /**
   * The single distinction the pruner exists for. Against a WCF endpoint an
   * omitted element means "leave this field alone" and xsi:nil means "blank
   * it", so the same payload must produce different XML depending on $prune.
   */
  public function testAnUnsetPropertyIsOmittedWhilePruningAndNilledWithoutIt(): void {
    $thing = new stdClass();
    $thing->Name = null;
    $thing->Count = 7;

    $pruned = $this->echo($thing);
    $raw = $this->echo($thing, prune: false);

    $this->assertSame(0, $this->elementCount($pruned, 'Name'), 'Pruning should have dropped the unset Name entirely.');
    $this->assertStringNotContainsString('xsi:nil', $pruned, 'A pruned request should carry no nils at all.');

    $this->assertSame(1, $this->elementCount($raw, 'Name'), 'Without pruning the Name element must still be emitted.');
    $this->assertStringContainsString('xsi:nil="true"', $raw, 'Without pruning, a null property must be sent as an explicit nil.');

    // Both requests are otherwise the same call, so the difference really is
    // the nil and not some other divergence.
    $this->assertSame(['7'], $this->textContentsOf($pruned, 'Count'));
    $this->assertSame(['7'], $this->textContentsOf($raw, 'Count'));
  }

  public function testZeroAndFalseStillEmitTheirElements(): void {
    $thing = new stdClass();
    $thing->Count = 0;
    $thing->Flag = false;

    $xml = $this->echo($thing);

    $this->assertSame(['0'], $this->textContentsOf($xml, 'Count'), 'Count = 0 was dropped; 0 is a value, not an absence.');
    $this->assertSame(['false'], $this->textContentsOf($xml, 'Flag'), 'Flag = false was dropped; false is a value, not an absence.');
  }

  public function testAnEmptyStringStillEmitsItsElement(): void {
    $thing = new stdClass();
    $thing->Name = '';

    $xml = $this->echo($thing);

    $this->assertSame(1, $this->elementCount($xml, 'Name'));
    $this->assertSame([''], $this->textContentsOf($xml, 'Name'));
  }

  public function testAnArrayOfTwoItemsEmitsTwoItemChildren(): void {
    $thing = new stdClass();
    $thing->Items = (object) ['Item' => [$this->item(1, 'one'), $this->item(2, 'two')]];

    $xml = $this->echo($thing);

    $this->assertSame(2, $this->elementCount($xml, 'Item'));
    $this->assertSame(['one', 'two'], $this->textContentsOf($xml, 'Label'));
  }

  /**
   * Hand ext-soap [0 => $a, 2 => $b] and it emits no Item elements at all,
   * without an error. The pruner repacks the list so that cannot happen.
   */
  public function testASparseArrayStillEmitsTwoItemChildren(): void {
    $thing = new stdClass();
    $thing->Items = (object) ['Item' => [0 => $this->item(1, 'one'), 2 => $this->item(2, 'two')]];

    $xml = $this->echo($thing);

    $this->assertSame(2, $this->elementCount($xml, 'Item'), 'A gap in the list silently cost an Item element.');
    $this->assertSame(['one', 'two'], $this->textContentsOf($xml, 'Label'));
  }

  public function testASparseArrayLosesItsContentsWithoutPruning(): void {
    // Not a promise of the library: the point is that the previous test is
    // testing something real. Handed the gap, ext-soap emits a single empty
    // <Item/> and drops both items' data, with no error anywhere.
    $thing = new stdClass();
    $thing->Items = (object) ['Item' => [0 => $this->item(1, 'one'), 2 => $this->item(2, 'two')]];

    $xml = $this->echo($thing, prune: false);

    $this->assertSame([], $this->textContentsOf($xml, 'Label'), 'The sparse list was expected to lose its data.');
    $this->assertSame([], $this->textContentsOf($xml, 'Id'));
  }

  public function testABackedEnumSerialisesAsThePlainString(): void {
    $thing = new stdClass();
    $thing->Kind = Kind::Alpha;

    $xml = $this->echo($thing);

    $this->assertSame(['Alpha'], $this->textContentsOf($xml, 'Kind'));
  }

  /**
   * Contents fields take raw bytes; encoding them first would store the
   * document base64'd twice and it would come back unreadable.
   */
  public function testRawBytesAreBase64EncodedExactlyOnce(): void {
    $raw = "%PDF-1.4\n\x00\x01\x02\xfe\xff binary \xc3\x28 payload";

    $thing = new stdClass();
    $thing->Blob = $raw;

    $encoded = $this->textContentsOf($this->echo($thing), 'Blob');

    $this->assertCount(1, $encoded);
    $this->assertSame($raw, base64_decode($encoded[0], true), 'Blob did not round-trip: it was encoded twice, or not at all.');
  }

  /**
   * WCF renders a dictionary as a list of Key/Value nodes. A PHP associative
   * array looks like the same thing and serialises to nothing.
   */
  public function testADictionaryEmitsKeyValueNodes(): void {
    $entry = new stdClass();
    $entry->Key = 101;
    $entry->Value = 'Smith';

    $thing = new stdClass();
    $thing->Bag = (object) ['KeyValueOfintstring' => [$entry]];

    $xml = $this->echo($thing);

    $this->assertSame(1, $this->elementCount($xml, 'KeyValueOfintstring'));
    $this->assertSame(['101'], $this->textContentsOf($xml, 'Key'));
    $this->assertSame(['Smith'], $this->textContentsOf($xml, 'Value'));
  }

  public function testAPlainAssociativeArrayLosesTheWholeDictionary(): void {
    // The failure mode DocumentManagementService::propertyBag() exists to stop:
    // the bag element is emitted, the entries inside it are not, and nothing
    // reports a problem.
    $thing = new stdClass();
    $thing->Bag = [101 => 'Smith'];

    $xml = $this->echo($thing);

    $this->assertSame([], $this->textContentsOf($xml, 'Key'), 'An associative array was expected to serialise to an empty bag.');
    $this->assertSame([], $this->textContentsOf($xml, 'Value'));
  }

  public function testNestedObjectsThatWereNeverPopulatedAreOmittedEntirely(): void {
    $child = new stdClass();
    $child->Inner = null;

    $thing = new stdClass();
    $thing->Name = 'kept';
    $thing->Child = $child;

    $xml = $this->echo($thing);

    $this->assertSame(0, $this->elementCount($xml, 'Child'), 'An all-null nested object should not reach the wire at all.');
    $this->assertSame(['kept'], $this->textContentsOf($xml, 'Name'));
  }

  public function testAPopulatedNestedObjectSurvives(): void {
    $child = new stdClass();
    $child->Inner = 'deep';

    $thing = new stdClass();
    $thing->Child = $child;

    $xml = $this->echo($thing);

    $this->assertSame(1, $this->elementCount($xml, 'Child'));
    $this->assertSame(['deep'], $this->textContentsOf($xml, 'Inner'));
  }

  private function item(int $id, string $label): stdClass {
    $item = new stdClass();
    $item->Id = $id;
    $item->Label = $label;

    return $item;
  }
}
