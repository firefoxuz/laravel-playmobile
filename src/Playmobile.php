<?php

namespace Firefoxuz\LaravelPlaymobile;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use phpDocumentor\Reflection\Types\Self_;
use phpDocumentor\Reflection\Types\This;

class Playmobile
{
    protected $url;

    protected $login;

    protected $password;

    public function __construct()
    {
        $this->url = config('playmobile.base_url') . 'send';
        $this->login = config('playmobile.login');
        $this->password = config('playmobile.password');
    }

    protected $maxMessages = 500;

    protected $messages = [];

    public function add($phone, $message)
    {
        $this->messages[] = [
            'phone' => $phone,
            'message' => $message,
        ];
        return $this;
    }

    public function show()
    {
        dd($this->messages);
    }


}
