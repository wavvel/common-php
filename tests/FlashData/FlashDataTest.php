<?php declare(strict_types=1);

namespace Tests\Wavvel\CommonPhp\FlashData;

use PHPUnit\Framework\TestCase;
use Wavvel\CommonPhp\FlashData\FlashData;

class FlashDataTest extends TestCase {
  private FlashData $flashData;

  public function setUp(): void {
    $this->flashData = new FlashData();
  }

  public function test_createErrors(): void {
    $flash = $this->flashData->createErrors(['bar']);

    $this->assertEquals(
      [
        'flashErrors' => ['bar']
      ],
      $flash
    );
  }
}
