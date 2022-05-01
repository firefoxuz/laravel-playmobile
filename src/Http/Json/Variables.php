<?php

namespace Firefoxuz\LaravelPlaymobile\Http\Json;

class Variables
{
    protected $variables = [];

    public function __get($name)
    {
        if (!property_exists($this, $name)) {
            $methodName = 'get' . ucfirst($name);
            return $this->$methodName;
        }

        return $this->$name;
    }

    public function addVariable(Variable $variable)
    {
        $this->variables[$variable->getName()] = $variable->getValue();

        return $this;
    }

    public function getVariable()
    {
        return $this->variables;
    }

    public function toArray(): array
    {
        return $this->variables;
    }
}
