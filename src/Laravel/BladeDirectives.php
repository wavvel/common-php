<?php declare(strict_types=1);

namespace Wavvel\CommonPhp\Laravel;

use Illuminate\Support\Facades\Blade;

class BladeDirectives {
  public static function registerCustomBladeDirectives(): void {
    Blade::directive('format_currency', function ($expression) {
      return "<?php echo (\Wavvel\CommonPhp\Formatter\CurrencyFormatter::format($expression)); ?>";
    });

    Blade::directive('price_per_unit', function ($expression) {
      $params = explode(',', $expression);
      list($price, $unit) = $params;

      return <<<PHP_TEMPLATE
        <?php
          echo sprintf('%s / %s', \Wavvel\CommonPhp\Formatter\CurrencyFormatter::format($price), $unit);
        ?>
      PHP_TEMPLATE;
    });
  }
}
