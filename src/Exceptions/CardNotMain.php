<?php

namespace Uzbek\Svgate\Exceptions;

class CardNotMain extends Exception
{
    public function cardNotMain(): CardNotMain
    {
        return new CardNotMain('The card is not main!', -221);
    }
}
