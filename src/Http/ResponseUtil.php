<?php declare(strict_types=1);

namespace Wavvel\CommonPhp\Http;

class ResponseUtil {
  public static function successPayload($data): array {
    $response = [
      'data' => $data
    ];

    return $response;
  }

  public static function errorPayload(string $errorType, $errorMessage): array {
    return [
      'error' => [
        'type' => $errorType,
        'message' => $errorMessage
      ]
    ];
  }
}
