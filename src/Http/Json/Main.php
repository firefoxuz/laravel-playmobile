<?php

namespace Firefoxuz\LaravelPlaymobile\Http\Json;

use Firefoxuz\LaravelPlaymobile\Exceptions\InvalidBodyException;

class Main
{
    protected string $template_id = '';

    protected string $priority = 'normal';

    protected Timing $timing;

    protected Sms $sms;

    protected Call $call;

    protected Messages $messages;

    public function __construct()
    {
        $this->timing = new Timing();
        $this->sms = new Sms();
        $this->call = new Call();
        $this->messages = new Messages();
    }

    public function __get($name)
    {
        if (!property_exists($this, $name)) {
            $methodName = 'get' . ucfirst($name);
            return $this->$methodName;
        }

        return $this->$name;
    }

    /**
     * @param Messages $messages
     */
    public function setMessages(Messages $messages): void
    {
        $this->messages = $messages;
    }

    /**
     * @return Messages
     */
    public function getMessages(): Messages
    {
        return $this->messages;
    }

    public function json(): string
    {
        return json_encode($this->array());
    }

    private function clearNullValue(array $arr){
        foreach ($arr as $key => $value) {
            if ($value === null) {
                unset($arr[$key]);
            }
        }

        return $arr;
    }

    public function array(): array
    {
        $arr = [
            'template_id' => $this->template_id,
            'priority' => $this->priority,
            'timing' => $this->timing->toArray(),
            'sms' => $this->sms->toArray(),
            'call' => $this->call->toArray(),
            'messages' => $this->messages->toArray(),
        ];

        return $this->clearNullValue($arr);
    }

}
