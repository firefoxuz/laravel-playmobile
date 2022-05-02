<?php

namespace Firefoxuz\LaravelPlaymobile\Http\Json;

class Messages
{
    protected array $messages = [];

    public function __get($name)
    {
        if (!property_exists($this, $name)) {
            $methodName = 'get' . ucfirst($name);
            return $this->$methodName;
        }

        return $this->$name;
    }

    public function addMessage(Message $message): self
    {
        $this->messages[] = $message;

        return $this;
    }

    public function setMessages(array $messages): self
    {
        $this->messages = $messages;

        return $this;
    }

    public function getMessages(): array
    {
        return $this->messages;
    }

    public function toArray(): array
    {
        $arr = [];
        foreach ($this->messages as $message) {
            $arr[] = $message->toArray();
        }
        return $arr;
    }
}
