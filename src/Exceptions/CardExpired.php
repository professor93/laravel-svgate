<?php

namespace Uzbek\Svgate\Exceptions;

class CardExpired extends Exception
{
    public function cardExpired(): CardExpired
    {
        return new CardExpired('Card expired, capture card!', -201);
    }
}
