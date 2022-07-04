<?php

namespace Uzbek\Svgate\Dtos;

use Uzbek\Svgate\Response\BaseResponse;

class CardInfoDto extends BaseResponse
{
    public string $id;
    public string $username;
    public string $pan;
    public string $expiry;
    public int $status;
    public string $phone;
    public string $fullName;
    public int $balance;
    public bool $sms;
    public int $pincnt;
    public string $aacct;
    public string $par;
    public string $cardtype;
    public int $holdAmount;
    public int $cashbackAmount;
}
