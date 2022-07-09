<?php

namespace Wavvel\CommonPhp\Facades;

use Illuminate\Support\Facades\Facade;

class CommonPhp extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return 'common-php';
    }
}
