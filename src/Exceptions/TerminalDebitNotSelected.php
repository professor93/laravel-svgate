<?php

namespace Uzbek\Svgate\Exceptions;

class TerminalDebitNotSelected extends Exception
{
    public function terminalDebitNotSelected(): TerminalDebitNotSelected
    {
        return new TerminalDebitNotSelected('Type terminal debit is not selected at the time of registration!', -318);
    }
}
