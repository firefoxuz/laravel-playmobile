<?php

namespace Firefoxuz\LaravelPlaymobile\Http;

use Firefoxuz\LaravelPlaymobile\Http\Json\Main;
use Illuminate\Support\Facades\Http;

class SendRequest extends Http
{
    protected $path = 'send';

    public function handle(Main $main)
    {
        return self::withBasicAuth(config('platmobile.login'), config('platmobile.password'))
            ->withBody($main->json(), 'application/json')
            ->post(config('platmobile.base_url') . $this->path);
    }
}
