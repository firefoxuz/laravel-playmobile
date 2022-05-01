<?php

namespace Firefoxuz\LaravelPlaymobile;

use Firefoxuz\LaravelPlaymobile\Http\Json\Main;
use Firefoxuz\LaravelPlaymobile\Http\SendRequest;

class Playmobile
{
    public function send(Main $main)
    {
        return SendRequest::handle($main->json());
    }

    public function sendJson(string $json)
    {
        return SendRequest::handle($json);
    }
}
