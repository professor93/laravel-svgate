<?php

namespace Uzbek\Svgate\Exceptions;

class CardLengthInvalid extends Exception
{
    public function cardLengthInvalid(): CardLengthInvalid
    {
        return new CardLengthInvalid('The length of the card number must be 6 digits!', -218);
    }
}
