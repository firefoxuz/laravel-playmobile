<?php

namespace Firefoxuz\LaravelPlaymobile\Http\Json;

class ContentSms
{
    protected ?string $text = null;

    public function __get($name)
    {
        if (!property_exists($this, $name)) {
            $methodName = 'get' . ucfirst($name);
            return $this->$methodName;
        }

        return $this->$name;
    }

    /**
     * @param string $text
     */
    public function setText(string $text): void
    {
        $this->text = $text;
    }

    /**
     * @return string
     */
    public function getText(): ?string
    {
        return $this->text;
    }

    public function toArray(): array
    {
        return [
            'text' => $this->text,
        ];
    }
}
