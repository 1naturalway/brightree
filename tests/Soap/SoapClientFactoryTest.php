<?php

namespace Brightree\Tests\Soap;

use Brightree\Soap\SoapClientFactory;
use Brightree\Tests\TestCase;
use SoapClient;

/**
 * The factory hands out one client per (WSDL, options) pair, so the cache key
 * is the whole contract. Two things must never happen: two different sets of
 * credentials sharing a client, and two option sets that differ only inside a
 * closure fingerprinting the same.
 *
 * Nothing here needs a WSDL. The installed builder returns a non-WSDL
 * SoapClient, which ext-soap creates without reading or fetching anything.
 */
final class SoapClientFactoryTest extends TestCase {
  /**
   * Options for a non-WSDL client: ext-soap only needs somewhere to pretend to
   * post to, and never contacts it unless an operation is called.
   *
   * @var array<string, string>
   */
  private const NON_WSDL = ['location' => 'http://localhost.invalid/x', 'uri' => 'urn:x'];

  /** @var int Number of times the installed builder ran. */
  private int $built = 0;

  protected function setUp(): void {
    parent::setUp();

    $this->built = 0;

    // Ignores both arguments on purpose: what is under test is which calls
    // reach the builder at all, not what it does with them.
    SoapClientFactory::using(function (string $wsdl, array $options): SoapClient {
      $this->built++;

      return new SoapClient(null, self::NON_WSDL);
    });
  }

  protected function tearDown(): void {
    SoapClientFactory::flush();

    parent::tearDown();
  }

  public function testIdenticalWsdlAndOptionsReturnTheSameInstance(): void {
    $options = ['login' => 'user', 'password' => 'secret', 'trace' => true];

    $first = SoapClientFactory::make('urn:wsdl-a', $options);
    $second = SoapClientFactory::make('urn:wsdl-a', $options);

    $this->assertSame($first, $second);
    $this->assertSame(1, $this->built, 'The second call rebuilt the client instead of reusing it.');
  }

  public function testOptionKeyOrderDoesNotChangeTheIdentity(): void {
    $first = SoapClientFactory::make('urn:wsdl-a', ['login' => 'user', 'trace' => true]);
    $second = SoapClientFactory::make('urn:wsdl-a', ['trace' => true, 'login' => 'user']);

    $this->assertSame($first, $second);
  }

  public function testADifferentWsdlReturnsADifferentInstance(): void {
    $options = ['login' => 'user'];

    $this->assertNotSame(
        SoapClientFactory::make('urn:wsdl-a', $options),
        SoapClientFactory::make('urn:wsdl-b', $options)
    );
  }

  public function testDifferentOptionsReturnADifferentInstance(): void {
    $this->assertNotSame(
        SoapClientFactory::make('urn:wsdl-a', ['trace' => true]),
        SoapClientFactory::make('urn:wsdl-a', ['trace' => false])
    );
  }

  public function testAnExtraOptionReturnsADifferentInstance(): void {
    $this->assertNotSame(
        SoapClientFactory::make('urn:wsdl-a', ['trace' => true]),
        SoapClientFactory::make('urn:wsdl-a', ['trace' => true, 'connection_timeout' => 5])
    );
  }

  public function testFlushForcesANewInstance(): void {
    $options = ['login' => 'user'];

    $first = SoapClientFactory::make('urn:wsdl-a', $options);
    SoapClientFactory::flush();
    $second = SoapClientFactory::make('urn:wsdl-a', $options);

    $this->assertNotSame($first, $second);
    $this->assertSame(2, $this->built);
  }

  /**
   * A credential change has to reach the wire. Sharing a client between two
   * logins would silently send one tenant's request as another.
   */
  public function testDifferentLoginsNeverShareAClient(): void {
    $one = SoapClientFactory::make('urn:wsdl-a', ['login' => 'alice', 'password' => 'secret']);
    $two = SoapClientFactory::make('urn:wsdl-a', ['login' => 'bob', 'password' => 'secret']);

    $this->assertNotSame($one, $two, 'Two logins shared one SoapClient.');
  }

  public function testDifferentPasswordsNeverShareAClient(): void {
    $one = SoapClientFactory::make('urn:wsdl-a', ['login' => 'alice', 'password' => 'old']);
    $two = SoapClientFactory::make('urn:wsdl-a', ['login' => 'alice', 'password' => 'new']);

    $this->assertNotSame($one, $two, 'A rotated password reused the client built with the old one.');
  }

  /**
   * json_encode() cannot serialise a resource, so a stream_context has to be
   * fingerprinted some other way or the key blows up.
   */
  public function testAStreamContextResourceDoesNotBreakFingerprinting(): void {
    $context = stream_context_create(['http' => ['timeout' => 5]]);

    $first = SoapClientFactory::make('urn:wsdl-a', ['stream_context' => $context]);
    $second = SoapClientFactory::make('urn:wsdl-a', ['stream_context' => $context]);

    $this->assertSame($first, $second);
  }

  public function testTwoStreamContextsAreNotConfused(): void {
    $one = stream_context_create(['http' => ['timeout' => 5]]);
    $two = stream_context_create(['http' => ['timeout' => 10]]);

    $this->assertNotSame(
        SoapClientFactory::make('urn:wsdl-a', ['stream_context' => $one]),
        SoapClientFactory::make('urn:wsdl-a', ['stream_context' => $two])
    );
  }

  /**
   * json_encode() renders every closure as {}. Two typemaps differing only in
   * their callbacks would collide onto one client, and the second caller would
   * get the first caller's conversions.
   */
  public function testOptionsDifferingOnlyInsideAClosureDoNotCollide(): void {
    // Held in locals for the length of the test: spl_object_id() is only
    // unique among live objects, and a collected closure frees its id.
    $first = static fn(string $xml): string => 'first';
    $second = static fn(string $xml): string => 'second';

    $one = SoapClientFactory::make('urn:wsdl-a', [
      'typemap' => [['type_ns' => 'urn:x', 'type_name' => 'Thing', 'from_xml' => $first]],
    ]);
    $two = SoapClientFactory::make('urn:wsdl-a', [
      'typemap' => [['type_ns' => 'urn:x', 'type_name' => 'Thing', 'from_xml' => $second]],
    ]);

    $this->assertNotSame($one, $two, 'Two typemaps with different callbacks were fingerprinted the same.');
    $this->assertSame(2, $this->built);
  }

  public function testTheSameClosureStillShares(): void {
    $callback = static fn(string $xml): string => 'same';
    $options = ['typemap' => [['type_ns' => 'urn:x', 'type_name' => 'Thing', 'from_xml' => $callback]]];

    $this->assertSame(
        SoapClientFactory::make('urn:wsdl-a', $options),
        SoapClientFactory::make('urn:wsdl-a', $options)
    );
  }

  /**
   * using(null) has to put the real constructor back, not merely stop calling
   * the last builder. The fixture WSDL proves it without touching a network.
   */
  public function testUsingNullRestoresTheDefaultBuilder(): void {
    SoapClientFactory::make('urn:wsdl-a', []);
    $this->assertSame(1, $this->built, 'The stub builder should have run while it was installed.');

    SoapClientFactory::using(null);

    $real = SoapClientFactory::make($this->fixtureWsdl('encoder-contract'), ['cache_wsdl' => WSDL_CACHE_MEMORY]);

    $this->assertSame(SoapClient::class, $real::class, 'using(null) did not restore the real SoapClient.');
    $this->assertSame(1, $this->built, 'The stub builder was still being used after using(null).');
  }

  public function testUsingAlsoFlushesSoTheChangeTakesEffectImmediately(): void {
    $stubbed = SoapClientFactory::make('urn:wsdl-a', []);

    SoapClientFactory::using(function (string $wsdl, array $options): SoapClient {
      $this->built++;

      return new SoapClient(null, self::NON_WSDL);
    });

    $this->assertNotSame($stubbed, SoapClientFactory::make('urn:wsdl-a', []));
    $this->assertSame(2, $this->built);
  }
}
