<?php

namespace Uzbek\Svgate\Exceptions;

class CardAddedToMain extends Exception
{
    public function cardAddedToMain(): CardAddedToMain
    {
        return new CardAddedToMain('The card is added to main cards!', -220);
    }
}
