<?php

namespace Firefoxuz\LaravelPlaymobile\Http\Json;

class Sms
{
    protected ?string $originator = '3700';

    protected ?int $ttl = null;

    protected ContentSms $content;

    public function __construct()
    {
        $this->content = new ContentSms();
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
     * @return string|null
     */
    public function getOriginator(): ?string
    {
        return $this->originator;
    }

    /**
     * @param string|null $originator
     */
    public function setOriginator(?string $originator): self
    {
        $this->orginator = $originator;
        return $this;
    }

    public function getTtl(): string
    {
        return $this->ttl;
    }

    public function setTtl(?int $ttl = null): self
    {
        $this->ttl = $ttl;
        return $this;
    }

    public function getContent(): ContentSms
    {
        return $this->content;
    }

    public function setContent(ContentSms $content): self
    {
        $this->content = $content;

        return $this;
    }

    private function clearNullValue(array $arr){
        foreach ($arr as $key => $value) {
            if ($value === null) {
                unset($arr[$key]);
            }
        }

        return $arr;
    }


    public function toArray(): array
    {
        return $this->clearNullValue([
            'originator' => $this->originator,
            'ttl' => $this->ttl,
            'content' => $this->content->toArray(),
        ]);
    }

}
