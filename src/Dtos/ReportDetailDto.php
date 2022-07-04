<?php

namespace Uzbek\Svgate\Dtos;

use Uzbek\Svgate\Response\BaseResponse;

class ReportDetailDto extends BaseResponse
{
    public string $id;
    public string $username;
    public string $refNum;
    public string $ext;
    public string $pan;
    public ?string $pan2;
    public string $expiry;
    public string $tranType;
    public string $date7;
    public string $date12;
    public int $amount;
    public string $currency;
    public string $stan;
    public string $field38;
    public ?string $field48;
    public ?string $field91;
    public EposDto $dto;
    public int $resp;
    public string $respText;
    public string $respSV;
    public string $status;
}
