<?php

namespace Uzbek\Svgate\Exceptions;

class PanOrExpiryInvalid extends Exception
{
    public function panOrExpiryInvalid(): PanOrExpiryInvalid
    {
        return new PanOrExpiryInvalid('Pan or expiry invalid, wrong format!', -212);
    }
}
