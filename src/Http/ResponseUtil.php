<?php declare(strict_types=1);

namespace Wavvel\CommonPhp;

class ResponseUtil {
  public function successPayload($data): array {
    $response = [
      'data' => $data
    ];

    return $response;
  }

  public function errorPayload(string $errorType, $errorMessage): array {
    return [
      'error' => [
        'type' => $errorType,
        'message' => $errorMessage
      ]
    ];
  }
}
