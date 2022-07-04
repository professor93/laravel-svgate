<?php

namespace Uzbek\Svgate\Dtos;

use Uzbek\Svgate\Response\BaseResponse;

class TransHistoryFilterDto extends BaseResponse
{
    public string $sort;
    public int $size;
    public int $number;
    public int $totalElements;
    public int $totalPages;
    public int $numberOfElements;
    public bool $first;
    public int $totalDebit;
    public int $totalCredit;
}
