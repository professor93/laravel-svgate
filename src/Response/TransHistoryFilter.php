<?php

namespace Uzbek\Svgate\Response;

use Uzbek\Svgate\Dtos\TransHistoryFilterDto;

class TransHistoryFilter extends BaseResponse
{
    public TransHistoryFilterDto $content;
    public bool $last;
    public int $totalElements;
    public int $totalPages;
    public int $size;
    public int $number;
    public ?string $sort;
    public int $numberOfElements;
    public bool $first;
    public int $totalDebit;
    public int $totalCredit;
}
