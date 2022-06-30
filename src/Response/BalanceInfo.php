<?php

namespace Uzbek\Svgate\Response;

class BalanceInfo extends BaseResponse
{
    public string $id;
    public string $pan;
    public int $balance;
}
