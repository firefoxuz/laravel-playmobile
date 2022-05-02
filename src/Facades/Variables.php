<?php

namespace Firefoxuz\LaravelPlaymobile\Facades;

class Variables extends \Illuminate\Support\Facades\Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return \Firefoxuz\LaravelPlaymobile\Http\Json\Variable::class;
    }
}
