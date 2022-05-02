<?php

namespace Firefoxuz\LaravelPlaymobile\Http\Json;


class Main
{
    protected ?string $template_id = null;

    protected ?string $priority = null;

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
     * @param string|null $template_id
     */
    public function setTemplateId(?string $template_id): void
    {
        $this->template_id = $template_id;
    }

    /**
     * @param string|null $priority
     */
    public function setPriority(?string $priority): void
    {
        $this->priority = $priority;
    }

    /**
     * @param Timing $timing
     */
    public function setTiming(Timing $timing): self
    {
        $this->timing = $timing;
        return $this;
    }

    /**
     * @param Sms $sms
     */
    public function setSms(Sms $sms): self
    {
        $this->sms = $sms;
        return $this;
    }

    /**
     * @param Call $call
     */
    public function setCall(Call $call): self
    {
        $this->call = $call;
        return $this;
    }

    /**
     * @param Messages $messages
     */
    public function setMessages(Messages $messages): self
    {
        $this->messages = $messages;
        return $this;
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

    private function clearNullValue(array $arr)
    {
        foreach ($arr as $key => $value) {
            if ($value === null) {
                unset($arr[$key]);
            }
        }

        return $arr;
    }

    private function clearNullArray($arr)
    {
        foreach ($arr as $key => $value) {
            if (empty($arr[$key])) {
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

        return $this->clearNullValue($this->clearNullArray($arr));
    }

}
