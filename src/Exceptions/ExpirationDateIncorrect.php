<?php

namespace Uzbek\Svgate\Exceptions;

class ExpirationDateIncorrect extends Exception
{
    public function expirationDateIncorrect(): ExpirationDateIncorrect
    {
        return new ExpirationDateIncorrect('Expiration date incorrect!', -216);
    }
}
