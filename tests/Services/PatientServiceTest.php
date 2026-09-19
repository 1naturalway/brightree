<?php

namespace Brightree\Tests\Services;

use Brightree\Patient\PatientPayor;
use Brightree\Tests\Support\StubPatientService;
use Brightree\Tests\TestCase;
use stdClass;

/**
 * The parts of PatientService that are logic rather than transport.
 *
 * patientPayorInfo() digs six levels into a response Brightree shapes
 * differently depending on how many payors a patient has: absent, one bare
 * object, or a list. Callers should not have to care, so the wrapper has to
 * flatten all three.
 */
final class PatientServiceTest extends TestCase {
  public function testPayorInfoIsEmptyWhenTheResponseChainIsMissing(): void {
    $service = new StubPatientService();
    $service->response = new stdClass();

    $this->assertSame([], $service->patientPayorInfo(1));
  }

  public function testPayorInfoIsEmptyWhenTheResponseIsNull(): void {
    $service = new StubPatientService();
    $service->response = null;

    $this->assertSame([], $service->patientPayorInfo(1));
  }

  public function testPayorInfoIsEmptyWhenThePatientHasNoPayors(): void {
    $service = new StubPatientService();
    $service->response = $this->responseWith(null);

    $this->assertSame([], $service->patientPayorInfo(1));
  }

  /**
   * One payor comes back as a bare object, not a one-element list. Returning
   * it unchanged would make every caller write is_array() themselves.
   */
  public function testASinglePayorIsWrappedIntoAOneElementArray(): void {
    $payor = $this->payor(11);

    $service = new StubPatientService();
    $service->response = $this->responseWith($payor);

    $result = $service->patientPayorInfo(1);

    $this->assertSame([$payor], $result);
  }

  public function testAListOfPayorsIsReturnedUnchanged(): void {
    $payors = [$this->payor(11), $this->payor(22), $this->payor(33)];

    $service = new StubPatientService();
    $service->response = $this->responseWith($payors);

    $this->assertSame($payors, $service->patientPayorInfo(1));
  }

  public function testPayorInfoFetchesByBrightreeId(): void {
    $service = new StubPatientService();
    $service->response = new stdClass();

    $service->patientPayorInfo(4321);

    $this->assertSame('PatientFetchByBrightreeID', $service->lastCall()['operation']);
    $this->assertSame(['BrightreeID' => 4321], $service->lastCall()['query']);
  }

  /**
   * PayorKey is read back off the payor object. A null payor is a caller
   * error, but it must surface as a plain request rather than as a warning
   * from inside the library.
   */
  public function testPayorAddToleratesANullPayor(): void {
    $service = new StubPatientService();

    $service->patientPayorAdd(7, null);

    $this->assertSame('PatientPayorAdd', $service->lastCall()['operation']);
    $this->assertSame(
        ['PatientKey' => 7, 'PayorKey' => null, 'PatientPayor' => null],
        $service->lastCall()['query']
    );
  }

  public function testPayorAddReadsPayorKeyOffThePayor(): void {
    $payor = new PatientPayor();
    $payor->PayorKey = 99;

    $service = new StubPatientService();
    $service->patientPayorAdd(7, $payor);

    $this->assertSame(99, $service->lastCall()['query']['PayorKey']);
    $this->assertSame($payor, $service->lastCall()['query']['PatientPayor']);
  }

  private function payor(int $key): stdClass {
    $payor = new stdClass();
    $payor->PayorKey = $key;

    return $payor;
  }

  /**
   * The nesting PatientFetchByBrightreeID really returns.
   */
  private function responseWith(mixed $payors): stdClass {
    $insurance = new stdClass();
    $insurance->Payors = new stdClass();
    $insurance->Payors->PatientPayorInfo = $payors;

    $patient = new stdClass();
    $patient->PatientInsuranceInfo = $insurance;

    $items = new stdClass();
    $items->Patient = $patient;

    $result = new stdClass();
    $result->Items = $items;

    $response = new stdClass();
    $response->PatientFetchByBrightreeIDResult = $result;

    return $response;
  }
}
