<?php

namespace Firefoxuz\LaravelPlaymobile\Http;

use Firefoxuz\LaravelPlaymobile\Http\Json\Main;
use Illuminate\Support\Facades\Http;

class SendRequest extends Http
{
    protected $path = 'send';

    public function __construct(Main $main)
    {
        return $this->handle($main);
    }

    public function handle(Main $main)
    {
        return self::withBasicAuth(config('playmobile.login'), config('playmobile.password'))
            ->withBody($main->json(), 'application/json')
            ->post(config('playmobile.base_url') . $this->path)->body();
    }
}
