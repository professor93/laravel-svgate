<?php

namespace Uzbek\Svgate\Exceptions;

class TransactionAlreadyExist extends Exception
{
    public function transactionAlreadyExist(): TransactionAlreadyExist
    {
        return new TransactionAlreadyExist('Transaction already exists in the database!', -207);
    }
}
