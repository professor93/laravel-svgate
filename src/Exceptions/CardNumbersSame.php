<?php

namespace Uzbek\Svgate\Exceptions;

class CardNumbersSame extends Exception
{
    public function cardNumbersSame(): CardNumbersSame
    {
        return new CardNumbersSame('Card numbers are the same!', -213);
    }
}
