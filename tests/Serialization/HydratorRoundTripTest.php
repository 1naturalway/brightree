<?php

namespace Brightree\Tests\Serialization;

use Brightree\Services\BaseService;
use Brightree\Soap\ResponseHydrator;
use Brightree\Tests\Support\Dto\Thing;
use Brightree\Tests\Support\RecordingSoapClient;
use Brightree\Tests\TestCase;
use DOMDocument;
use DOMElement;

/**
 * The round trip, end to end, through the encoder that actually has to honour
 * it.
 *
 * ResponseHydratorTest says what the hydrator does with response objects
 * written by hand. This says what happens when the response objects come from
 * ext-soap decoding real XML, and what ext-soap then puts back on the wire
 * after RequestPruner has had the hydrated DTO — which is the only way to show
 * that fetch, edit, send is lossless.
 *
 * The contract is tests/Fixtures/encoder-contract.wsdl: generic, written for
 * this suite, nothing proprietary in it.
 */
final class HydratorRoundTripTest extends TestCase {
  /**
   * A response with everything the round trip has to survive: scalars, a
   * nested object, a collection of several, a collection of one, a collection
   * four levels down, a decimal, an enumerated value, an xsi:nil, and an
   * element the request DTO does not declare.
   */
  private const RESPONSE_BODY = <<<'XML'
    <Name>Order 555</Name>
    <Count>2</Count>
    <Flag>false</Flag>
    <Child><Inner>deep</Inner></Child>
    <Items>
      <Item>
        <Id>1</Id>
        <Label>first</Label>
        <Amount>12.50</Amount>
        <Tags>
          <Tag><Name>red</Name><Weight>1.5</Weight></Tag>
          <Tag><Name>blue</Name><Weight>2.25</Weight></Tag>
        </Tags>
        <ServerNote>set by the service</ServerNote>
      </Item>
      <Item>
        <Id>2</Id>
        <Label xsi:nil="true"/>
        <Amount>0</Amount>
        <Tags>
          <Tag><Name>green</Name></Tag>
        </Tags>
      </Item>
    </Items>
    <Kind>Alpha</Kind>
    <StrictKind>Beta</StrictKind>
    XML;

  /**
   * Elements the request DTO deliberately does not carry, so their absence
   * from the re-encoded request is correct rather than a loss.
   *
   * @var string[]
   */
  private const RESPONSE_ONLY = ['ServerNote'];

  /**
   * The acceptance criterion: hydrate, prune, encode, and the request body is
   * what was fetched, minus the nils and the response-only elements. Nothing
   * populated goes missing and nothing absent becomes an explicit null.
   */
  public function testAFetchedRecordReEncodesToTheRequestItCameFrom(): void {
    $thing = ResponseHydrator::hydrate(Thing::class, $this->fetch(self::RESPONSE_BODY), $skipped);

    $sent = $this->sendBack($thing);

    $this->assertSame(
        $this->canonicalise($this->responseElement(self::RESPONSE_BODY)),
        $this->canonicalise($this->requestElement($sent)),
        'The re-encoded request is not the record that was fetched.'
    );

    $this->assertSame(['Thing.Items[0].ServerNote'], $skipped, 'Only the response-only element should have been dropped.');
  }

  /**
   * The same round trip with SOAP_SINGLE_ELEMENT_ARRAYS on. It changes the
   * decoded shape — a one-element collection arrives as a list rather than a
   * bare object — and must not change what goes back out.
   */
  public function testTheRoundTripIsUnchangedBySingleElementArrays(): void {
    $decoded = $this->fetch(self::RESPONSE_BODY, ['features' => SOAP_SINGLE_ELEMENT_ARRAYS]);

    $sent = $this->sendBack(ResponseHydrator::hydrate(Thing::class, $decoded));

    $this->assertSame(
        $this->canonicalise($this->responseElement(self::RESPONSE_BODY)),
        $this->canonicalise($this->requestElement($sent))
    );
  }

  /**
   * The point of the whole exercise: change two fields on a fetched record and
   * everything else goes back exactly as it came, including the ~50 fields
   * nobody touched.
   */
  public function testEditingTwoFieldsChangesOnlyThoseTwoElements(): void {
    $thing = ResponseHydrator::hydrate(Thing::class, $this->fetch(self::RESPONSE_BODY));

    $thing->Items[0]->Amount = 30.00;
    $thing->Items[0]->Label = 'repriced';

    $before = $this->canonicalise($this->responseElement(self::RESPONSE_BODY));
    $after = $this->canonicalise($this->requestElement($this->sendBack($thing)));

    $this->assertSame('12.5', $before['Items'][0]['Item'][0]['Amount'][0]);
    $this->assertSame('30', $after['Items'][0]['Item'][0]['Amount'][0]);
    $this->assertSame('repriced', $after['Items'][0]['Item'][0]['Label'][0]);

    // Everything else is untouched, the nested tags included.
    unset($before['Items'][0]['Item'][0]['Amount'], $before['Items'][0]['Item'][0]['Label']);
    unset($after['Items'][0]['Item'][0]['Amount'], $after['Items'][0]['Item'][0]['Label']);
    $this->assertSame($before, $after);
  }

  /**
   * The failure the pruner exists to prevent, restated for the hydrator: an
   * element the response never carried must not come back as a nil, because
   * against a WCF endpoint that blanks the field.
   */
  public function testTheReEncodedRequestCarriesNoNils(): void {
    $thing = ResponseHydrator::hydrate(Thing::class, $this->fetch(self::RESPONSE_BODY));

    $sent = $this->sendBack($thing);

    $this->assertStringNotContainsString('xsi:nil', $sent, 'A hydrated DTO put a nil back on the wire.');
    $this->assertSame(0, $this->elementCount($sent, 'Blob'), 'Blob was never in the response and must not be sent.');
  }

  /**
   * The one way a value's text is not byte-identical after the round trip.
   * ext-soap decodes xs:decimal to a string to preserve precision, but the
   * DTOs declare those fields float — as they always have — so the value
   * makes the trip as a float and is re-encoded without its trailing zero.
   * The decimal is unchanged; only its spelling is.
   */
  public function testADecimalKeepsItsValueButNotItsTrailingZero(): void {
    $sent = $this->sendBack(ResponseHydrator::hydrate(Thing::class, $this->fetch(
        '<Items><Item><Amount>12.50</Amount></Item></Items>'
    )));

    $amounts = $this->textContentsOf($sent, 'Amount');

    $this->assertSame(['12.5'], $amounts);
    $this->assertSame(12.50, (float) $amounts[0], 'The value itself must be unchanged.');
  }

  /**
   * Zero is a value a caller may well have meant, and the pruner keeps it, so
   * a zero amount has to survive rather than be treated as an absence.
   */
  public function testAZeroAmountSurvivesTheRoundTrip(): void {
    $sent = $this->sendBack(ResponseHydrator::hydrate(Thing::class, $this->fetch(
        '<Items><Item><Amount>0</Amount></Item></Items>'
    )));

    $this->assertSame(['0'], $this->textContentsOf($sent, 'Amount'));
  }

  public function testACollectionOfOneAndOfManyBothSurviveTheRoundTrip(): void {
    $one = $this->sendBack(ResponseHydrator::hydrate(Thing::class, $this->fetch(
        '<Items><Item><Id>1</Id><Label>only</Label></Item></Items>'
    )));

    $many = $this->sendBack(ResponseHydrator::hydrate(Thing::class, $this->fetch(
        '<Items><Item><Id>1</Id><Label>one</Label></Item><Item><Id>2</Id><Label>two</Label></Item></Items>'
    )));

    $this->assertSame(1, $this->elementCount($one, 'Item'));
    $this->assertSame(['only'], $this->textContentsOf($one, 'Label'));

    $this->assertSame(2, $this->elementCount($many, 'Item'));
    $this->assertSame(['one', 'two'], $this->textContentsOf($many, 'Label'));
  }

  /**
   * Brightree sends the wrapper element with no children for an empty
   * collection. Sending an empty collection back reads as "replace this with
   * nothing", so the pruner drops it — and the element must not reappear.
   */
  public function testAnEmptyCollectionDoesNotComeBackAsAnEmptyElement(): void {
    $sent = $this->sendBack(ResponseHydrator::hydrate(Thing::class, $this->fetch('<Name>kept</Name><Items/>')));

    $this->assertSame(['kept'], $this->textContentsOf($sent, 'Name'));
    $this->assertSame(0, $this->elementCount($sent, 'Items'));
  }

  // ------------------------------------------------------------------ plumbing

  /**
   * Decode a response body through the real ext-soap decoder and return the
   * node a caller would hydrate.
   *
   * @param array<string, mixed> $options
   */
  private function fetch(string $body, array $options = []): object {
    $client = new RecordingSoapClient($this->fixtureWsdl('encoder-contract'), $options + ['cache_wsdl' => WSDL_CACHE_MEMORY]);
    $client->response = $this->envelope($body);

    /** @var object $response */
    $response = $client->Echo(['thing' => new \stdClass()]);

    return $response->EchoResult;
  }

  /**
   * Send a hydrated DTO back through the pruner and the real encoder, and
   * return the request XML that produced.
   */
  private function sendBack(Thing $thing): string {
    $service = new BaseService([]);
    $service->wsdl_path = $this->fixtureWsdl('encoder-contract');

    return $this->capture($service, static fn(BaseService $s): mixed => $s->custom('Echo', ['thing' => $thing]));
  }

  private function envelope(string $body): string {
    return '<?xml version="1.0" encoding="utf-8"?>'
    . '<s:Envelope xmlns:s="http://schemas.xmlsoap.org/soap/envelope/"><s:Body>'
    . '<EchoResponse xmlns="urn:brightree-tests" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance">'
    . '<EchoResult>' . $body . '</EchoResult>'
    . '</EchoResponse></s:Body></s:Envelope>';
  }

  private function responseElement(string $body): DOMElement {
    $document = new DOMDocument();
    $document->preserveWhiteSpace = false;
    $this->assertTrue($document->loadXML($this->envelope($body)));

    return $document->getElementsByTagNameNS('*', 'EchoResult')->item(0);
  }

  private function requestElement(string $request): DOMElement {
    $document = $this->document($request);

    return $document->getElementsByTagNameNS('*', 'thing')->item(0);
  }

  /**
   * Reduce an element to a comparable structure: child element names mapped to
   * the list of their values, namespaces and attributes ignored.
   *
   * Two things are deliberately dropped. An element carrying xsi:nil is an
   * explicit null, which the pruner removes on purpose and which the
   * acceptance criterion excludes. So are the elements the request DTO does
   * not declare, listed in RESPONSE_ONLY.
   *
   * @return array<string, list<mixed>>
   */
  private function canonicalise(DOMElement $element): array {
    $children = [];

    foreach ($element->childNodes as $child) {
      if (!$child instanceof DOMElement) {
        continue;
      }

      $name = $child->localName;

      if (in_array($name, self::RESPONSE_ONLY, true) || $child->getAttributeNS('http://www.w3.org/2001/XMLSchema-instance', 'nil') === 'true') {
        continue;
      }

      $children[$name][] = $this->hasElementChildren($child) ? $this->canonicalise($child) : self::decimal($child->textContent);
    }

    return $children;
  }

  /**
   * Put a decimal into one form on both sides of the comparison.
   *
   * The DTOs declare every xs:decimal as float, which is how this library has
   * always modelled Brightree's money fields, so a value makes the trip as a
   * PHP float and 12.50 comes back as 12.5. That is the same decimal, not a
   * loss, and testADecimalKeepsItsValueButNotItsTrailingZero states it
   * outright so it is not hidden here. Only values written with a decimal
   * point are touched, so a long numeric id is compared as the string it is.
   */
  private static function decimal(string $text): string {
    return is_numeric($text) && str_contains($text, '.') ? (string) (float) $text : $text;
  }

  private function hasElementChildren(DOMElement $element): bool {
    foreach ($element->childNodes as $child) {
      if ($child instanceof DOMElement) {
        return true;
      }
    }

    return false;
  }
}
