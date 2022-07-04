<?php

namespace Uzbek\Svgate\Dtos;

use Uzbek\Svgate\Response\BaseResponse;

class HoldGetCardIdDto extends BaseResponse
{
    public int $hid;
    public string $crefNo;
    public int $reqamt;
    public string $createTime;
    public string $waitingTime;
    public int $status;
    public ?string $remark;
    public ?string $accNo;
    public string $userName;
}
