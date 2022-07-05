<?php

namespace Uzbek\Svgate;

use Uzbek\Svgate\Models\Cards;
use Uzbek\Svgate\Models\Hold;
use Uzbek\Svgate\Models\P2p;
use Uzbek\Svgate\Models\Report;
use Uzbek\Svgate\Models\Terminal;
use Uzbek\Svgate\Models\Transfer;

class Svgate
{
    public function cards()
    {
        return new Cards();
    }

    public function p2p()
    {
        return new P2p();
    }

    public function hold()
    {
        return new Hold();
    }

    public function report()
    {
        return new Report();
    }

    public function terminal()
    {
        return new Terminal();
    }

    public function transfer()
    {
        return new Transfer();
    }
}
