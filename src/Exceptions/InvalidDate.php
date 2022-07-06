<?php

namespace Uzbek\Svgate\Exceptions;

class InvalidDate extends Exception
{
    public function invalidDate(): InvalidDate
    {
        return new InvalidDate('Invalid date! Date must not be less than or equal to the current!', -214);
    }
}
