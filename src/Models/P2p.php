<?php

namespace Uzbek\Svgate\Models;

use Uzbek\Svgate\Dtos\EposDto;
use Uzbek\Svgate\Dtos\SenderDto;
use Uzbek\Svgate\Response\P2pId2Id;
use Uzbek\Svgate\Response\P2pId2Pan;
use Uzbek\Svgate\Response\P2pInfo;
use Uzbek\Svgate\Response\P2pUniversal;
use Uzbek\Svgate\Response\P2pUniversalCredit;

class P2p extends BaseModel
{
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
}
