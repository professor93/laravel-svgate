<?php

namespace Uzbek\Svgate\Exceptions;

class CardBlocked extends Exception
{
    public function cardBlocked(): CardBlocked
    {
        return new CardBlocked('Card blocked!', -205);
    }
}
