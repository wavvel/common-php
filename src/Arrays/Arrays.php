<?php declare(strict_types=1);

namespace Wavvel\CommonPhp\Arrays;

use Illuminate\Support\Str;
use Closure;

class Arrays {
  public static function keysToCamelCase(array $array): array {
    return collect($array)->mapWithKeys(function ($val, $key) {
      return [
        Str::camel($key) => $val
      ];
    })->all();
  }

  public static function keysToSnakeCase(array $array): array {
    return collect($array)->mapWithKeys(function ($val, $key) {
      return [
        Str::snake($key) => $val
      ];
    })->all();
  }

  public static function mapKey(array $array, Closure $fn): array {
    return collect($array)->mapWithKeys(function ($val, $key) use ($fn) {
      $newKey = $fn($key);

      return [
        $newKey => $val
      ];
    })->all();
  }
}
