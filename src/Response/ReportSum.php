<?php

namespace Uzbek\Svgate\Response;

use DateTime;

class ReportSum extends BaseResponse
{
    public DateTime $from;
    public DateTime $to;
    public int $count;
    public int $sum;
}
