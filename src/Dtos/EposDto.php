<?php

namespace Uzbek\Svgate\Dtos;

use Uzbek\Svgate\Response\BaseResponse;

class EposDto extends BaseResponse
{
    private string $merchantId;
    private string $terminalId;
    private ?int $port;
}
