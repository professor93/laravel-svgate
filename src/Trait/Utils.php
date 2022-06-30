<?php

namespace Uzbek\Trait;

use Exception;
use Ramsey\Uuid\Uuid;

trait Utils
{
    public function getDate12(): string
    {
        return date('ymdHis');
    }

    public function generateExt(): string
    {
        try {
            $ext_id = str_replace('-', '', Uuid::uuid4()->toString());
        } catch (Exception $e) {
            $ext_id = hrtime(true);
        }

        return $ext_id;
    }
}
