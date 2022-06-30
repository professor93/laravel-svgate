<?php

namespace Uzbek\Svgate\Response;

use Uzbek\Svgate\Dtos\EposDto;

class TransferPay extends BaseResponse
{
    public string $id;
    public string $username;
    public string $refNum;
    public string $ext;
    public string $pan;
    public string $tranType;
    public string $date7;
    public string $date12;
    public int $amount;
    public int $commission;
    public string $currency;
    public int $stan;
    public EposDto $dto;
    public int $resp;
    public string $respText;
    public string $respSV;
    public string $status;
}
