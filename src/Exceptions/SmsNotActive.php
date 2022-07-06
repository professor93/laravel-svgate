<?php

namespace Uzbek\Svgate\Exceptions;

class SmsNotActive extends Exception
{
    public function smsNotActive(): SmsNotActive
    {
        return new SmsNotActive('SMS is not active!', -206);
    }
}
