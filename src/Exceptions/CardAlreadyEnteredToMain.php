<?php

namespace Uzbek\Svgate\Exceptions;

class CardAlreadyEnteredToMain extends Exception
{
    public function cardAlreadyEnteredToMain(): CardAlreadyEnteredToMain
    {
        return new CardAlreadyEnteredToMain('The card has already entered to main cards!', -219);
    }
}
