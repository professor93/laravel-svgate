<?php

namespace Uzbek\Svgate\Dtos;

use Uzbek\Svgate\Response\BaseResponse;

class ReportShortDto extends BaseResponse
{
    public int $amount;
    public string $date;
    public string $svId;
    public string $extId;
}
