<?php

namespace Uzbek\Svgate\Models;

use DateTime;
use Uzbek\Svgate\Response\ReportDetail;
use Uzbek\Svgate\Response\ReportShort;
use Uzbek\Svgate\Response\ReportSum;

class Report extends BaseModel
{
    public function getReportSum(DateTime $from, DateTime $to): ReportSum
    {
        $response = $this->sendRequest('report.sum', [
            "report" => [
                "from" => $from,
                "to" => $to,
            ],
        ]);

        return new ReportSum($response);
    }

    public function getReportDetail(DateTime $from, DateTime $to, int $pageNumber, int $pageSize): ReportDetail
    {
        $response = $this->sendRequest('report.detail', [
            "report" => [
                "range" => [
                    "from" => $from,
                    "to" => $to,
                ],
                "pageNumber" => $pageNumber,
                "pageSize" => $pageSize,
            ],
        ]);


        return new ReportDetail($response['trans']);
    }

    public function getReportShort(DateTime $from, DateTime $to, int $pageNumber, int $pageSize): ReportShort
    {
        $response = $this->sendRequest('report.short', [
            "report" => [
                "range" => [
                    "from" => $from,
                    "to" => $to,
                ],
                "pageNumber" => $pageNumber,
                "pageSize" => $pageSize,
            ],
        ]);

        return new ReportShort($response['trans']);
    }
}
