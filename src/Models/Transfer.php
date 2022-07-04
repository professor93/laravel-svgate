<?php

namespace Uzbek\Svgate\Models;

use Uzbek\Svgate\Dtos\EposDto;
use Uzbek\Svgate\Response\TerminalAdd;
use Uzbek\Svgate\Response\TransferExt;
use Uzbek\Svgate\Response\TransferPay;
use Uzbek\Svgate\Response\TransferReverse;
use Uzbek\Svgate\Response\TransferReversePartial;
use Uzbek\Svgate\Response\TransHistoryFilter;

class Transfer extends BaseModel
{
    public function transferPay(int $amount, string $cardId, array $payload): TransferPay
    {
        $response = $this->sendRequest('trans.pay.purpose', [
            "tran" => [
                "purpose" => $payload["purpose"],
                "receiverId" => $payload["receiverId"],
                "cardId" => $cardId,
                "amount" => $amount,
                "commission" => $payload["commission"],
                "currency" => $payload["currency"],
                "ext" => $this->generateExt(),
                "merchantId" => $payload["merchantId"],
                "terminalId" => $payload["terminalId"],
            ],
        ]);

        return new TransferPay($response);
    }

    public function transferExt(string $extId): TransferExt
    {
        $response = $this->sendRequest('trans.ext', [
            "extId" => $extId,
        ]);

        return new TransferExt($response);
    }

    public function transferReverse(string $tranId): TransferReverse
    {
        $response = $this->sendRequest('trans.reverse', [
            "tranId" => $tranId,
        ]);

        return new TransferReverse($response);
    }

    public function transferReservePartial(string $tranId, int $reverseAmount): TransferReversePartial
    {
        $response = $this->sendRequest('trans.reverse.partial', [
            "tran" => [
                "tranId" => $tranId,
                "reverseAmount" => $reverseAmount,
                "ext" => $this->generateExt(),
            ],
        ]);

        return new TransferReversePartial($response);
    }

    //TODO: to asking
    public function getTransHistoryFilter(array $cardIds, string $startDate, string $endDate, int $pageNumber, int $pageSize, int $isCredit)
    {
        $response = $this->sendRequest('trans.history.filter', [
            "criteria" => [
                "cardIds" => $cardIds,
                "range" => [
                    "startDate" => $startDate,
                    "endDate" => $endDate,
                ],
                "pageNumber" => $pageNumber,
                "pageSize" => $pageSize,
                "isCredit" => $isCredit,
            ],
        ]);


        return new TransHistoryFilter($response['content']);
    }

    public function getTransHistory(array $cardIds, string $startDate, string $endDate, int $pageNumber, int $pageSize): TransHistoryFilter
    {
        $response = $this->sendRequest('trans.history', [
            "criteria" => [
                "cardIds" => $cardIds,
                "range" => [
                    "startDate" => $startDate,
                    "endDate" => $endDate,
                ],
                "pageNumber" => $pageNumber,
                "pageSize" => $pageSize,
            ],
        ]);


        return new TransHistoryFilter($response);
    }

    public function terminalAdd(EposDto $dto, string $name, int $type): TerminalAdd
    {
        $response = $this->sendRequest('terminal.add', [
            "terminal" => [
                "merchantId" => $dto->getMerchantId(),
                "terminalId" => $dto->getTerminalId(),
                "port" => $dto->getPort(),
                "name" => $name,
                "type" => $type,
            ],
        ]);

        return new TerminalAdd($response);
    }
}
