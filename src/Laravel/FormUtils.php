<?php declare(strict_types=1);

namespace Wavvel\CommonPhp\Laravel;

use Illuminate\Support\Str;

class FormUtils {
  public static function formInputKeyToLaravelFormKey(string $inputKey): string {
    // 'foo' => 'foo'
    // 'foo[bar] => 'foo.bar'
    // 'foo[bar][baz] => 'foo.bar.baz'
    return Str::replace(']', '', Str::replace('[', '.', $inputKey));
  }

  public static function getFirstError($errors, $inputKey) {
    return $errors->first(FormUtils::formInputKeyToLaravelFormKey($inputKey));
  }
}
