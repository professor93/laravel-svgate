<?php

namespace Uzbek\Svgate\Exceptions;

class EmptyParameters extends Exception
{
    public function emptyParameters(): EmptyParameters
    {
        return new EmptyParameters('Empty parameters!', -100);
    }
}
