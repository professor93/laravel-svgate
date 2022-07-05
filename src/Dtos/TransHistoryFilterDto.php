<?php

namespace Uzbek\Svgate\Dtos;

use Uzbek\Svgate\Response\BaseResponse;

class TransHistoryFilterDto extends BaseResponse
{
    public string $utrnno;
    public string $transType;
    public string $hpan;
    public string $utime;
    public string $udate;
    public ?string $bankDate;
    public int $reqamt;
    public int $resp;
    public bool $reversal;
    public int $orgdev;
    public string $merchant;
    public string $terminal;
    public string $merchantName;
    public ?string $street;
    public ?string $city;
    public bool $isCredit;
    public bool $credit;
    public int $mcc;
    public string $currency;
    public int $actamt;
    public int $acctbal;
}
