<?php

namespace Firefoxuz\LaravelPlaymobile\Validators;

class DateTimeValidator extends \DateTime
{
    public function isValid($date, $format = 'Y-m-d H:i')
    {
        $dt = self::createFromFormat($format, $date);
        return $dt && $dt->format($format) === $date;
    }
}
