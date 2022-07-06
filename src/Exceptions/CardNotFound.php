<?php

namespace Uzbek\Svgate\Exceptions;

class CardNotFound extends Exception
{
    public function cardNotFound(): CardNotFound
    {
        return new CardNotFound('Card not found!', -200);
    }
}
