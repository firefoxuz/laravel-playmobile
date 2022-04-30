<?php

namespace Firefoxuz\LaravelPlaymobile\Http\Json;

class Sms
{
    protected ?string $orginator = null;

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
    public function getOrginator(): ?string
    {
        return $this->orginator;
    }

    /**
     * @param string|null $orginator
     */
    public function setOrginator(?string $orginator): void
    {
        $this->orginator = $orginator;
    }

    public function getTtl(): string
    {
        return $this->ttl;
    }

    public function setTtl(?int $ttl = null): void
    {
        $this->ttl = $ttl;
    }

    public function getContent(): ContentSms
    {
        return $this->content;
    }

    public function setContent(ContentSms $content): void
    {
        $this->content = $content;
    }

    public function toArray(): array
    {
        return [
            'orginator' => $this->orginator,
            'ttl' => $this->ttl,
            'content' => $this->content->toArray(),
        ];
    }

}
