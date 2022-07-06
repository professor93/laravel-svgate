<?php

namespace Uzbek\Svgate\Exceptions;

class TransferSameCardsNotPossible extends Exception
{
    public function transferSameCardsNotPossible(): TransferSameCardsNotPossible
    {
        return new TransferSameCardsNotPossible('Transfer between the same cards not possible!', -210);
    }
}
