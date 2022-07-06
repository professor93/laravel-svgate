<?php

namespace Uzbek\Svgate\Exceptions;

class WrongPhoneNumberFormat extends Exception
{
    public function wrongPhoneNumberFormat(): WrongPhoneNumberFormat
    {
        return new WrongPhoneNumberFormat('Wrong phone number format!', -217);
    }
}
