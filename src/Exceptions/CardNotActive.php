<?php

namespace Uzbek\Svgate\Exceptions;

class CardNotActive extends Exception
{
    public function cardNotActive(): CardNotActive
    {
        return new CardNotActive('Card status is not active!', -204);
    }
}
