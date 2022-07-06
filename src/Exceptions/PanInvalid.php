<?php

namespace Uzbek\Svgate\Exceptions;

class PanInvalid extends Exception
{
    public function panInvalid(): PanInvalid
    {
        return new PanInvalid('Pan invalid, wrong format!', -202);
    }
}
