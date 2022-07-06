<?php

namespace Uzbek\Svgate\Exceptions;

class TransactionNotFound extends Exception
{
    public function transactionNotFound()
    {
        return new TransactionNotFound('Transaction not found!', -208);
    }
}
