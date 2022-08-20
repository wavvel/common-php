<?php declare(strict_types=1);

namespace Wavvel\CommonPhp\FlashData;

class FlashData {
  public function __construct() {

  }

  /**
   * Create a common structure for flash data. As of now it will
   * just put the given flash data under "flash" key.
   */
  public function create($data): mixed {
    return $data;
  }

  public function createErrors(mixed $data): array {
    return $this->create([
      'flashErrors' => $data
    ]);
  }

  public function createSuccess(mixed $data): array {
    return $this->create([
      'flashSuccess' => $data
    ]);
  }
}
