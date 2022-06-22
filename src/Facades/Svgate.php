<?php

namespace Uzbek\Svgate\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Uzbek\Svgate\Svgate
 */
class Svgate extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'laravel-svgate';
    }
}
