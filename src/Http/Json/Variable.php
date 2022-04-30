<?php

namespace Firefoxuz\LaravelPlaymobile\Http\Json;

class Variable
{
    protected string $name;

    protected string $value;

    public function add($name, $value)
    {
        $this->name = $name;
        $this->value = $value;

        return $this;
    }

    public function get()
    {
        return [
            'name' => $this->name,
            'value' => $this->value,
        ];
    }

    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'value' => $this->value,
        ];
    }
}
