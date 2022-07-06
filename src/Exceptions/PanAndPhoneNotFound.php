<?php

namespace Uzbek\Svgate\Exceptions;

class PanAndPhoneNotFound extends Exception
{
    public function panAndPhoneNotFound(): PanAndPhoneNotFound
    {
        return new PanAndPhoneNotFound('Pan and phone not found!', -215);
    }
}
