<?php

namespace Firefoxuz\LaravelPlaymobile\Http\Json;

use Firefoxuz\LaravelPlaymobile\Exceptions\InvalidBodyException;

class Message
{
    protected ?string $recipient = null;

    protected ?string $message_id = null;

    protected ?string $template_id = null;

    protected ?string $priority = '';

    protected Timing $timing;

    protected Variables $variables;

    protected Sms $sms;

    protected Call $call;

    public function __construct()
    {
        $this->timing = new Timing();
        $this->variables = new Variables();
        $this->sms = new Sms();
        $this->call = new Call();
    }

    public function __get($name)
    {
        if (!property_exists($this, $name)) {
            $methodName = 'get' . ucfirst($name);
            return $this->$methodName;
        }

        return $this->$name;
    }

    public function getRecipient(): ?string
    {
        return $this->recipient;
    }

    public function setRecipient(string $recipient): self
    {
        $this->recipient = $recipient;

        return $this;
    }

    public function getMessageId(): ?string
    {
        return $this->message_id;
    }

    public function setMessageId(string $message_id): self
    {
        $this->message_id = $message_id;

        return $this;
    }

    public function getTemplateId(): ?string
    {
        return $this->template_id;
    }

    public function setTemplateId(string $template_id): self
    {
        $this->template_id = $template_id;

        return $this;
    }

    public function getPriority(): ?string
    {
        return $this->priority;
    }

    public function setPriority(string $priority): self
    {
        $this->priority = $priority;

        return $this;
    }

    public function getTiming(): ?Timing
    {
        return $this->timing;
    }

    public function setTiming(Timing $timing): self
    {
        $this->timing = $timing;

        return $this;
    }

    public function getVariables(): ?Variables
    {
        return $this->variables;
    }

    public function getSms(): ?Sms
    {
        return $this->sms;
    }

    public function setSms(Sms $sms): self
    {
        $this->sms = $sms;

        return $this;
    }

    public function getCall(): ?Call
    {
        return $this->call;
    }

    public function setCall(Call $call): self
    {
        $this->call = $call;

        return $this;
    }

    private function clearNullValue(array $arr)
    {
        foreach ($arr as $key => $value) {
            if ($value === null) {
                unset($arr[$key]);
            }
        }

        return $arr;
    }

    public function toArray()
    {
        $arr = [
            'recipient' => $this->recipient,
            'message-id' => $this->message_id,
            'template-id' => $this->template_id,
            'priority' => $this->priority,
            'timing' => $this->timing->toArray(),
            'variables' => $this->variables->toArray(),
            'sms' => $this->getSms()->toArray(),
            'call' => $this->getCall()->toArray(),
        ];

        return $this->clearNullValue($arr);
    }
}
