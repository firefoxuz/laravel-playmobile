<?php

namespace Firefoxuz\LaravelPlaymobile\Facades;

class Message  extends \Illuminate\Support\Facades\Facade
{
    protected static function getFacadeAccessor()
    {
        return \Firefoxuz\LaravelPlaymobile\Http\Json\Message::class;
    }
}
