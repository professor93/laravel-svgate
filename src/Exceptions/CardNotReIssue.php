<?php

namespace Uzbek\Svgate\Exceptions;

class CardNotReIssue extends Exception
{
    public function cardNotReIssue(): CardNotReIssue
    {
        return new CardNotReIssue('Card not re-issue!', -203);
    }
}
