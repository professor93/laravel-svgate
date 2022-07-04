<?php

namespace Uzbek\Svgate\Models;

use Uzbek\Svgate\Svgate;

class BaseModel
{

    public function __construct(protected Svgate $svgate)
    {

    }
}
