<?php

namespace Uzbek\Svgate\Response;

class HoldGetCardId extends BaseResponse
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
