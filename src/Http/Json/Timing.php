<?php

namespace Firefoxuz\LaravelPlaymobile\Http\Json;


use Firefoxuz\LaravelPlaymobile\Exceptions\InvalidParameterException;
use Firefoxuz\LaravelPlaymobile\Validators\DateTimeValidator;

class Timing
{
    protected ?int $localtime = null;

    protected ?string $start_datetime = null;

    protected ?string $end_datetime = null;

    protected ?string $allowed_starttime = null;

    protected ?string $allowed_endtime = null;

    protected ?int $send_evenly = null;

    private DateTimeValidator $dateTimeValidator;

    public function __construct()
    {
        $this->dateTimeValidator = new DateTimeValidator();
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
     * @return int
     */
    public function getLocaltime(): ?int
    {
        return $this->localtime;
    }

    /**
     * @param int $localtime
     */
    public function setLocaltime(int $localtime): void
    {
        if (!in_array($localtime, [0, 1])) {
            throw new InvalidParameterException('Invalid localtime parameter');
        }

        $this->localtime = $localtime;
    }

    /**
     * @return string
     */
    public function getStartDatetime(): ?string
    {
        return $this->start_datetime;
    }

    /**
     * @param string $start_datetime
     */
    public function setStartDatetime(string $start_datetime): void
    {
        if (!$this->dateTimeValidator->isValid($start_datetime, 'Y-m-d H:i')) {
            throw new InvalidParameterException('Invalid start_datetime parameter');
        }

        $this->start_datetime = $start_datetime;
    }

    /**
     * @return string
     */
    public function getEndDatetime(): ?string
    {
        return $this->end_datetime;
    }

    /**
     * @param string $end_datetime
     */
    public function setEndDatetime(string $end_datetime): void
    {
        if (!$this->dateTimeValidator->isValid($end_datetime, 'Y-m-d H:i')) {
            throw new InvalidParameterException('Invalid end_datetime parameter');
        }

        $this->end_datetime = $end_datetime;
    }

    /**
     * @return string
     */
    public function getAllowedStarttime(): ?string
    {
        return $this->allowed_starttime;
    }

    /**
     * @param string $allowed_starttime
     */
    public function setAllowedStarttime(string $allowed_starttime): void
    {
        if (!$this->dateTimeValidator->isValid($allowed_starttime, 'H:i')) {
            throw new InvalidParameterException('Invalid allowed_starttime parameter');
        }
        $this->allowed_starttime = $allowed_starttime;
    }

    /**
     * @return string
     */
    public function getAllowedEndtime(): ?string
    {
        return $this->allowed_endtime;
    }

    /**
     * @param string $allowed_endtime
     */
    public function setAllowedEndtime(string $allowed_endtime): void
    {
        if (!$this->dateTimeValidator->isValid($allowed_endtime, 'H:i')) {
            throw new InvalidParameterException('Invalid allowed_endtime parameter');
        }

        $this->allowed_endtime = $allowed_endtime;
    }


    /**
     * @return int
     */
    public function getSendEvenly(): ?int
    {
        return $this->send_evenly;
    }

    /**
     * @param int $send_evenly
     */
    public function setSendEvenly(int $send_evenly): void
    {
        if (!in_array($send_evenly, [0, 1])) {
            throw new InvalidParameterException('Invalid send_evenly parameter');
        }

        $this->send_evenly = $send_evenly;
    }

    public function toArray(): array
    {
        return [
            'localtime' => $this->getLocaltime(),
            'start-datetime' => $this->getStartDatetime(),
            'end-datetime' => $this->getEndDatetime(),
            'allowed-starttime' => $this->getAllowedStarttime(),
            'allowed-endtime' => $this->getAllowedEndtime(),
            'send-evenly' => $this->getSendEvenly(),
        ];
    }
}
