<?php

namespace Vortechstudio\Helpers\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Vortechstudio\Helpers\Helpers
 */
class Helpers extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Vortechstudio\Helpers\Helpers::class;
    }
}
