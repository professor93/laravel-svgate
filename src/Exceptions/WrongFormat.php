<?php

namespace Uzbek\Svgate\Exceptions;

class WrongFormat extends Exception
{
    public function wrongFormat(): WrongFormat
    {
        return new WrongFormat('Wrong format!', -209);
    }
}
