<?php

namespace Uzbek\Svgate\Exceptions;

class ServerNotResponding extends Exception
{
    public function serverNotResponding(): ServerNotResponding
    {
        return new ServerNotResponding('Server is not responding, try again later!', -211);
    }
}
