<?php declare(strict_types=1);

namespace Wavvel\CommonPhp\FlashData;

class FlashData {
  public function __construct() {

  }

  /**
   * Create a common structure for flash data. As of now it will
   * just put the given flash data under "flash" key.
   */
  public function create($data): array {
    return [
      'flash' => $data
    ];
  }

  public function createErrors(array $data): array {
    return $this->create([
      'errors' => $data
    ]);
  }
}
