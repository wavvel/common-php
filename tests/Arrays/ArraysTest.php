<?php declare(strict_types=1);

namespace Tests\Wavvel\CommonPhp\Arrays;

use PHPUnit\Framework\TestCase;
use Wavvel\CommonPhp\Arrays\Arrays;

class ArraysTest extends TestCase {
  public function test_keysToCamelCase(): void {
    $this->assertEquals(
      ['fooBar' => 1],
      Arrays::keysToCamelCase([
        'foo_bar' => 1
      ])
    );
  }

  public function test_keysToSnakeCase(): void {
    $this->assertEquals(
      ['foo_bar' => 1],
      Arrays::keysToSnakeCase([
        'fooBar' => 1
      ])
    );
  }

  public function test_mapKey(): void {
    $this->assertEquals(
      ['fooBar-haha' => 1],
      Arrays::mapKey([ 'fooBar' => 1 ], function ($key) {
        return sprintf('%s-haha', $key);
      })
    );
  }
}
