<?php

namespace Brightree\Tests\Soap;

use Brightree\Soap\RequestPruner;
use RuntimeException;
use Brightree\Tests\Support\Kind;
use Brightree\Tests\Support\UninitialisedProperties;
use Brightree\Tests\TestCase;
use DateTimeImmutable;
use DateTimeZone;
use PHPUnit\Framework\Attributes\DataProvider;
use SoapParam;
use SoapVar;
use stdClass;

/**
 * Unit tests for the pruner in isolation.
 *
 * The one distinction everything here turns on: a property the caller never
 * set is noise and must go, while a property the caller set to a falsy value
 * is data and must survive.
 */
final class RequestPrunerTest extends TestCase {
  public function testNullPropertiesAreDropped(): void {
    $value = new stdClass();
    $value->Kept = 'yes';
    $value->Dropped = null;

    $pruned = RequestPruner::value($value);

    $this->assertSame(['Kept' => 'yes'], (array) $pruned);
  }

  public function testNullArrayEntriesAreDropped(): void {
    $this->assertSame(['a', 'b'], RequestPruner::value(['a', null, 'b']));
  }

  /**
   * The whole reason this class exists rather than a simple array_filter().
   */
  #[DataProvider('falsyValues')]
  public function testFalsyValuesAreKept(mixed $falsy, string $label): void {
    $value = new stdClass();
    $value->Field = $falsy;

    $pruned = RequestPruner::value($value);

    $this->assertNotNull($pruned, $label . ' was dropped, but a caller set it deliberately.');
    $this->assertSame($falsy, $pruned->Field, $label . ' did not survive pruning unchanged.');
  }

  /**
   * @return iterable<string, array{mixed, string}>
   */
  public static function falsyValues(): iterable {
    yield 'false' => [false, 'false'];
    yield 'zero int' => [0, '0'];
    yield 'zero float' => [0.0, '0.0'];
    yield 'empty string' => ['', "''"];
    yield 'string zero' => ['0', "'0'"];
  }

  public function testFalsyValuesSurviveInsideAnArray(): void {
    $this->assertSame([false, 0, 0.0, '', '0'], RequestPruner::value([false, 0, 0.0, '', '0']));
  }

  public function testObjectWhosePropertiesAllPruneAwayBecomesNull(): void {
    $value = new stdClass();
    $value->A = null;
    $value->B = null;

    $this->assertNull(RequestPruner::value($value));
  }

  public function testEmptyArrayBecomesNull(): void {
    $this->assertNull(RequestPruner::value([]));
  }

  public function testArrayOfNothingButNullsBecomesNull(): void {
    $this->assertNull(RequestPruner::value([null, null]));
  }

  public function testNestedObjectsPruneRecursively(): void {
    $leaf = new stdClass();
    $leaf->Value = 'deep';
    $leaf->Gone = null;

    $middle = new stdClass();
    $middle->Leaf = $leaf;
    $middle->Empty = new stdClass();

    $root = new stdClass();
    $root->Middle = $middle;
    $root->Nothing = null;

    $pruned = RequestPruner::value($root);

    $this->assertSame(['Middle'], array_keys((array) $pruned));
    $this->assertSame(['Leaf'], array_keys((array) $pruned->Middle));
    $this->assertSame(['Value' => 'deep'], (array) $pruned->Middle->Leaf);
  }

  public function testBackedEnumUnwrapsToItsValue(): void {
    $this->assertSame('Alpha', RequestPruner::value(Kind::Alpha));

    $value = new stdClass();
    $value->Kind = Kind::Beta;

    $this->assertSame('Beta', RequestPruner::value($value)->Kind);
  }

  public function testDateTimeBecomesAnIso8601String(): void {
    $date = new DateTimeImmutable('2024-03-05 12:34:56', new DateTimeZone('+02:00'));

    $this->assertSame('2024-03-05T12:34:56+02:00', RequestPruner::value($date));
  }

  public function testSoapVarPassesThroughUntouched(): void {
    $var = new SoapVar('<Raw>x</Raw>', XSD_ANYXML);

    $this->assertSame($var, RequestPruner::value($var));

    $wrapper = new stdClass();
    $wrapper->Node = $var;

    $this->assertSame($var, RequestPruner::value($wrapper)->Node);
  }

  public function testSoapParamPassesThroughUntouched(): void {
    $param = new SoapParam('x', 'Name');

    $this->assertSame($param, RequestPruner::value($param));
  }

  public function testUninitialisedTypedPropertiesAreSkipped(): void {
    $pruned = RequestPruner::value(new UninitialisedProperties());

    $this->assertSame(['Bar' => 'kept'], (array) $pruned);
  }

  /**
   * ext-soap emits nothing at all for a repeating element whose PHP array has
   * gaps, so a list that went through unset() has to be repacked.
   */
  public function testSparseIntegerKeyedArraysAreRepacked(): void {
    $this->assertSame(['a', 'b'], RequestPruner::value([0 => 'a', 2 => 'b']));
  }

  public function testSparseArraysOfObjectsAreRepacked(): void {
    $first = new stdClass();
    $first->Id = 1;
    $second = new stdClass();
    $second->Id = 2;

    $pruned = RequestPruner::value([0 => $first, 7 => $second]);

    $this->assertSame([0, 1], array_keys($pruned));
    $this->assertSame(1, $pruned[0]->Id);
    $this->assertSame(2, $pruned[1]->Id);
  }

  public function testRepackingClosesTheGapLeftByAPrunedEntry(): void {
    $this->assertSame(['a', 'b'], RequestPruner::value(['a', null, 'b']));
  }

  public function testStringKeyedMapsKeepTheirKeys(): void {
    $this->assertSame(
        ['Second' => 'b', 'First' => 'a'],
        RequestPruner::value(['Second' => 'b', 'First' => 'a', 'Gone' => null])
    );
  }

  public function testMixedKeyArraysKeepTheirKeys(): void {
    $this->assertSame([3 => 'a', 'Name' => 'b'], RequestPruner::value([3 => 'a', 'Name' => 'b']));
  }

  /**
   * A back-reference reachable down two sibling properties makes a naive walk
   * cost 2^depth. Identity tracking must cut it at the first repeat.
   */
  public function testABranchingCycleTerminatesQuickly(): void {
    $a = new stdClass();
    $b = new stdClass();
    $a->x = $b;
    $a->y = $b;
    $b->p = $a;
    $b->q = $a;

    $started = microtime(true);
    $pruned = RequestPruner::value($a);
    $elapsed = microtime(true) - $started;

    $this->assertLessThan(1.0, $elapsed, 'Pruning a branching cycle took ' . $elapsed . 's; it should be immediate.');
    $this->assertNull($pruned, 'A graph of nothing but back-references has no content to send.');
  }

  public function testABranchingCycleWithRealContentTerminatesQuickly(): void {
    $a = new stdClass();
    $b = new stdClass();
    $a->Name = 'a';
    $b->Name = 'b';
    $a->x = $b;
    $a->y = $b;
    $b->p = $a;
    $b->q = $a;

    $started = microtime(true);
    $pruned = RequestPruner::value($a);
    $elapsed = microtime(true) - $started;

    $this->assertLessThan(1.0, $elapsed, 'Pruning a branching cycle took ' . $elapsed . 's; it should be immediate.');
    $this->assertSame('a', $pruned->Name);
    $this->assertSame('b', $pruned->x->Name);
    $this->assertSame('b', $pruned->y->Name);
    $this->assertObjectNotHasProperty('p', $pruned->x, 'The back-reference to the parent should have been cut.');
  }

  public function testSelfReferenceTerminates(): void {
    $node = new stdClass();
    $node->Name = 'self';
    $node->self = $node;

    $started = microtime(true);
    $pruned = RequestPruner::value($node);

    $this->assertLessThan(1.0, microtime(true) - $started);
    $this->assertSame(['Name' => 'self'], (array) $pruned);
  }

  /**
   * Two properties pointing at the same object is a diamond, not a cycle. Cut
   * one of the branches and a caller silently loses data they did set.
   */
  public function testADiamondIsNotTreatedAsACycle(): void {
    $leaf = new stdClass();
    $leaf->Value = 'shared';

    $root = new stdClass();
    $root->Left = $leaf;
    $root->Right = $leaf;

    $pruned = RequestPruner::value($root);

    $this->assertSame('shared', $pruned->Left->Value ?? null, 'The first branch lost the shared leaf.');
    $this->assertSame('shared', $pruned->Right->Value ?? null, 'The second branch lost the shared leaf.');
  }

  public function testADiamondInsideAnArrayIsNotTreatedAsACycle(): void {
    $leaf = new stdClass();
    $leaf->Value = 'shared';

    $pruned = RequestPruner::value([$leaf, $leaf]);

    $this->assertCount(2, $pruned);
    $this->assertSame('shared', $pruned[0]->Value);
    $this->assertSame('shared', $pruned[1]->Value);
  }

  public function testArgumentsDropsTopLevelParametersThatPruneToNull(): void {
    $empty = new stdClass();
    $empty->Nothing = null;

    $pruned = RequestPruner::arguments([
      'BrightreeID' => 7,
      'Missing' => null,
      'EmptyObject' => $empty,
      'EmptyList' => [],
      'Zero' => 0,
    ]);

    $this->assertSame(['BrightreeID' => 7, 'Zero' => 0], $pruned);
  }

  public function testArgumentsOnAnEmptyMapStaysAnEmptyMap(): void {
    $this->assertSame([], RequestPruner::arguments([]));
  }

  public function testPayloadPrunesAnArrayMap(): void {
    $this->assertSame(['A' => 1], RequestPruner::payload(['A' => 1, 'B' => null]));
  }

  public function testPayloadPrunesAnObject(): void {
    $value = new stdClass();
    $value->Kept = 'yes';
    $value->Dropped = null;

    $pruned = RequestPruner::payload($value);

    $this->assertInstanceOf(stdClass::class, $pruned);
    $this->assertSame(['Kept' => 'yes'], (array) $pruned);
  }

  /**
   * An operation called with nothing populated still has to be called, so the
   * payload degrades to an empty object rather than to null — and not to the
   * original graph either, which would put every nil back.
   */
  public function testPayloadReturnsAnEmptyStdClassWhenAnObjectPrunesToNothing(): void {
    $value = new stdClass();
    $value->A = null;
    $value->B = null;

    $pruned = RequestPruner::payload($value);

    $this->assertInstanceOf(stdClass::class, $pruned);
    $this->assertNotSame($value, $pruned, 'Returning the original object would send back every nil.');
    $this->assertSame([], (array) $pruned);
  }

  public function testPayloadLeavesSoapVarAlone(): void {
    $var = new SoapVar('<Raw>x</Raw>', XSD_ANYXML);

    $this->assertSame($var, RequestPruner::payload($var));
  }

  public function testPayloadLeavesSoapParamAlone(): void {
    $param = new SoapParam('x', 'Name');

    $this->assertSame($param, RequestPruner::payload($param));
  }

  public function testPayloadLeavesScalarsAlone(): void {
    $this->assertSame('text', RequestPruner::payload('text'));
    $this->assertSame(0, RequestPruner::payload(0));
    $this->assertSame(false, RequestPruner::payload(false));
    $this->assertNull(RequestPruner::payload(null));
  }

  /**
   * Silently dropping an over-deep branch would be the same class of failure
   * this class exists to prevent, so it has to be loud.
   */
  public function testExceedingTheDepthCapThrowsRatherThanDroppingTheBranch(): void {
    $root = new stdClass();
    $node = $root;
    for ($i = 0; $i < 70; $i++) {
      $node->Child = new stdClass();
      $node = $node->Child;
    }
    $node->Name = 'leaf';

    $this->expectException(RuntimeException::class);
    $this->expectExceptionMessageMatches('/nests deeper than 64 levels/');

    RequestPruner::value($root);
  }

  public function testADeepButLegalPayloadIsStillPruned(): void {
    $root = new stdClass();
    $node = $root;
    for ($i = 0; $i < 20; $i++) {
      $node->Child = new stdClass();
      $node = $node->Child;
    }
    $node->Name = 'leaf';

    $pruned = RequestPruner::value($root);

    for ($i = 0; $i < 20; $i++) {
      $pruned = $pruned->Child;
    }
    $this->assertSame('leaf', $pruned->Name);
  }
}
