<?php

namespace Uzbek\Svgate\Response;

use Uzbek\Svgate\Dtos\TransHistoryFilterDto;

class TransHistory
{
    public TransHistoryFilterDto $content;
    public string $last;
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
