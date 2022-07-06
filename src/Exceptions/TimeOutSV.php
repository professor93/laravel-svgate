<?php

namespace Uzbek\Svgate\Exceptions;

class TimeOutSV extends Exception
{
    public function timeOutSV(): TimeOutSV
    {
        return new TimeOutSV('Time out SV!', -307);
    }
}
