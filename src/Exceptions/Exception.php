<?php

namespace Uzbek\Svgate\Exceptions;

use Exception as BaseException;
use Throwable;

class Exception extends BaseException
{
    public function __construct($message = '', $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
