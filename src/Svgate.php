<?php

namespace Uzbek\Svgate;

use DateTime;
use Uzbek\Svgate\Dtos\EposDto;
use Uzbek\Svgate\Dtos\SenderDto;
use Uzbek\Svgate\Response\Balance;
use Uzbek\Svgate\Response\CardInfo;
use Uzbek\Svgate\Response\CardNew;
use Uzbek\Svgate\Response\CardsNewOtp;
use Uzbek\Svgate\Response\HoldCreate;
use Uzbek\Svgate\Response\HoldDismiss;
use Uzbek\Svgate\Response\HoldDismissCharge;
use Uzbek\Svgate\Response\HoldGetCardId;
use Uzbek\Svgate\Response\HoldGetId;
use Uzbek\Svgate\Response\P2pId2Id;
use Uzbek\Svgate\Response\P2pId2Pan;
use Uzbek\Svgate\Response\P2pInfo;
use Uzbek\Svgate\Response\P2pUniversal;
use Uzbek\Svgate\Response\P2pUniversalCredit;
use Uzbek\Svgate\Response\ReportDetail;
use Uzbek\Svgate\Response\ReportShort;
use Uzbek\Svgate\Response\ReportSum;
use Uzbek\Svgate\Response\TransferExt;
use Uzbek\Svgate\Response\TransferPay;
use Uzbek\Svgate\Response\TransferReverse;
use Uzbek\Svgate\Response\TransferReversePartial;
use Uzbek\Trait\Base;
use Uzbek\Trait\Utils;

class Svgate
{
    use Utils;
    use Base;

    public function cardsNewOtp(string $pan, string $expiry): CardsNewOtp
    {
        $response = $this->sendRequest('cards.new.otp', [
            'card' => [
                'pan' => $pan,
                'expiry' => $expiry,
            ],
        ]);

        return new CardsNewOtp($response);
    }

    public function cardsNewVerify(string $id, string $code): CardNew
    {
        $response = $this->sendRequest('cards.new.verify', [
            'otp' => [
                'id' => $id,
                'code' => $code,
            ],
        ]);

        return new CardNew($response);
    }

    public function getByIds(array $ids): array
    {
        $response = $this->sendRequest('cards.get', [
            'ids' => $ids,
        ]);

        if (isset($response['error'])) {
            return [];
        }

        $res = [];

        foreach ($response as $item) {
            $res[] = new CardInfo($item);
        }


        return $res;
    }

    public function getBalance(array $ids): array
    {
        $response = $this->sendRequest('balance.get', [
            'ids' => $ids,
        ]);

        if (isset($response['error'])) {
            return [];
        }

        $res = [];

        foreach ($response as $item) {
            $res[] = new Balance($item);
        }


        return $res;
    }

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

    public function transferExt(string $extId): array
    {
        $response = $this->sendRequest('trans.ext', [
            "extId" => $extId,
        ]);

        if (isset($response['error'])) {
            return [];
        }

        $res = [];

        foreach ($response as $item) {
            $res[] = new TransferExt($item);
        }


        return $res;
    }

    public function transferReverse(string $tranId): array
    {
        $response = $this->sendRequest('trans.reverse', [
            "tranId" => $tranId,
        ]);

        if (isset($response['error'])) {
            return [];
        }

        $res = [];

        foreach ($response as $item) {
            $res[] = new TransferReverse($item);
        }

        return $res;
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

    public function p2pId2Id(int $amount, int $amountCredit, EposDto $dto, int $stan, string $cardId, string $recipientId): P2pId2Id
    {
        $response = $this->sendRequest('p2p.id2id', [
            "p2p" => [
                "amount" => $amount,
                "amountCredit" => $amountCredit,
                "date12" => $this->getDate12(),
                "ext" => $this->generateExt(),
                "merchantId" => $dto->getMerchantId(),
                "port" => $dto->getPortId(),
                "terminalId" => $dto->getTerminalId(),
                "stan" => $stan,
                "cardId" => $cardId,
                "recipientId" => $recipientId,
            ],
        ]);

        return new P2pId2Id($response);
    }

    public function p2pId2Pan(int $amount, EposDto $dto, int $stan, string $cardId, string $pan, string $expiry): P2pId2Pan
    {
        $response = $this->sendRequest('p2p.id2pan', [
            "p2p" => [
                "amount" => $amount,
                "date12" => $this->getDate12(),
                "ext" => $this->generateExt(),
                "merchantId" => $dto->getMerchantId(),
                "port" => $dto->getPortId(),
                "terminalId" => $dto->getTerminalId(),
                "stan" => $stan,
                "cardId" => $cardId,
                "recipient" => [
                    "pan" => $pan,
                    "expiry" => $expiry,
                ],
            ],
        ]);

        return new P2pId2Pan($response);
    }

    public function p2pUniversal(string $sender, string $recipient, int $amount, int $feeAmount, EposDto $dto): P2pUniversal
    {
        $response = $this->sendRequest('p2p.id2pan', [
            "p2p" => [
                "sender" => $sender,
                "recipient" => $recipient,
                "amount" => $amount,
                "feeAmount" => $feeAmount,
                "ext" => $this->generateExt(),
                "merchantId" => $dto->getMerchantId(),
                "terminalId" => $dto->getTerminalId(),
            ],
        ]);

        return new P2pUniversal($response);
    }

    public function p2pUniversalCredit(int $amount, EposDto $dto, string $recipient, SenderDto $senderDto): P2pUniversalCredit
    {
        $response = $this->sendRequest('p2p.id2pan', [
            "credit" => [
                "ext" => $this->generateExt(),
                "recipient" => $recipient,
                "amount" => $amount,
                "merchantId" => $dto->getMerchantId(),
                "terminalId" => $dto->getTerminalId(),
                "sender" => $senderDto,
            ],
        ]);

        return new P2pUniversalCredit($response);
    }

    public function p2pInfo(string $hpan): P2pInfo
    {
        $response = $this->sendRequest('p2p.info', [
            "hpan" => $hpan,
        ]);

        return new P2pInfo($response);
    }

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

    public function getReportDetail(DateTime $from, DateTime $to, int $pageNumber, int $pageSize): array
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

        if (isset($response['error'])) {
            return [];
        }

        $res = [];

        foreach ($response['trans'] as $item) {
            $res[] = new ReportDetail($item);
        }


        return $res;
    }

    public function getReportShort(DateTime $from, DateTime $to, int $pageNumber, int $pageSize): array
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

        if (isset($response['error'])) {
            return [];
        }

        $res = [];

        foreach ($response['trans'] as $item) {
            $res[] = new ReportShort($item);
        }


        return $res;
    }

    public function holdCreate(string $cardId, EposDto $dto, int $amount, int $time)
    {
        $response = $this->sendRequest('hold.create', [
            "hold" => [
                "cardId" => $cardId,
                "merchantId" => $dto->getMerchantId(),
                "terminalId" => $dto->getTerminalId(),
                "amount" => $amount,
                "time" => $time,
            ],
        ]);

        return new HoldCreate($response);
    }

    public function holdDismiss(string $holdId, EposDto $dto, int $amount): HoldDismiss
    {
        $response = $this->sendRequest('hold.dismiss', [
            "hold" => [
                "holdId" => $holdId,
                "merchantId" => $dto->getMerchantId(),
                "terminalId" => $dto->getTerminalId(),
                "amount" => $amount,
            ],
        ]);

        return new HoldDismiss($response);
    }

    public function holdDismissCharge(string $holdId, EposDto $dto, string $stan, int $amount): HoldDismissCharge
    {
        $response = $this->sendRequest('hold.dismiss.charge', [
            "hold" => [
                "holdId" => $holdId,
                "ext" => $this->generateExt(),
                "merchantId" => $dto->getMerchantId(),
                "port" => $dto->getPort(),
                "terminalId" => $dto->getTerminalId(),
                "stan" => $stan,
                "amount" => $amount,
                "date12" => $this->getDate12(),
            ],
        ]);

        return new HoldDismissCharge($response);
    }

    public function holdGetId(int $id): HoldGetId
    {
        $response = $this->sendRequest('hold.get.id', [
            "id" => $id,
        ]);

        return new HoldGetId($response);
    }

    public function holdGetCardId(string $cardId)
    {
        $response = $this->sendRequest('"hold.get.cardId', [
            "cardId" => $cardId,
        ]);

        if (isset($response['error'])) {
            return [];
        }

        $res = [];

        foreach ($response as $item) {
            $res[] = new HoldGetCardId($item);
        }


        return $res;
    }
}
