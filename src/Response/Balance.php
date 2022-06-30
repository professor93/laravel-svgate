<?php

namespace Uzbek\Svgate\Response;

class Balance extends BaseResponse
{
    public BalanceInfo $balanceInfo;
    public int $totalBalance;
}
