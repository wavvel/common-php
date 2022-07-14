<?php declare(strict_types=1);

namespace Wavvel\CommonPhp\Formatter;

class CurrencyFormatter {
  public static function format(
    float | int $number,
    int $decimalCount = 0,
    string $decimalSeparator = ',',
    string $thousandSeparator = '.'
  ): string {
    return number_format($number, $decimalCount, $decimalSeparator, $thousandSeparator);
  }
}
