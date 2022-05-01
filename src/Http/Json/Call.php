<?php

namespace Firefoxuz\LaravelPlaymobile\Http\Json;

class Call
{
    protected ?string $text = null;

    protected ?string $file = null;

    protected ?string $menu = null;

    protected ?int $retry_attempts = null;

    protected ?int $retry_timeout = null;

    public function __get($name)
    {
        if (!property_exists($this, $name)) {
            $methodName = 'get' . ucfirst($name);
            return $this->$methodName;
        }

        return $this->$name;
    }

    /**
     * @return string
     */
    public function getText(): ?string
    {
        return $this->text;
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
    public function getFile(): ?string
    {
        return $this->file;
    }

    /**
     * @param string $file
     */
    public function setFile(string $file): void
    {
        $this->file = $file;
    }

    /**
     * @return string
     */
    public function getMenu(): ?string
    {
        return $this->menu;
    }

    /**
     * @param string $menu
     */
    public function setMenu(string $menu): void
    {
        $this->menu = $menu;
    }

    /**
     * @return int
     */
    public function getRetryAttempts(): ?int
    {
        return $this->retry_attempts;
    }

    /**
     * @param int $retry_attempts
     */
    public function setRetryAttempts(int $retry_attempts): void
    {
        $this->retry_attempts = $retry_attempts;
    }

    /**
     * @return int
     */
    public function getRetryTimeout(): ?int
    {
        return $this->retry_timeout;
    }

    /**
     * @param int $retry_timeout
     */
    public function setRetryTimeout(int $retry_timeout): void
    {
        $this->retry_timeout = $retry_timeout;
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
            'text' => $this->text,
            'file' => $this->file,
            'menu' => $this->menu,
            'retry_attempts' => $this->retry_attempts,
            'retry_timeout' => $this->retry_timeout,
        ]);
    }

}
