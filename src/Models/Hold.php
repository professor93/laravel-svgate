<?php

namespace Uzbek\Svgate\Models;

use Uzbek\Svgate\Dtos\EposDto;
use Uzbek\Svgate\Response\HoldCreate;
use Uzbek\Svgate\Response\HoldDismiss;
use Uzbek\Svgate\Response\HoldDismissCharge;
use Uzbek\Svgate\Response\HoldGetCardId;
use Uzbek\Svgate\Response\HoldGetId;

class Hold extends BaseModel
{
    public function holdCreate(string $cardId, EposDto $dto, int $amount, int $time): HoldCreate
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

    public function holdGetCardId(string $cardId): HoldGetCardId
    {
        $response = $this->sendRequest('hold.get.cardId', [
            "cardId" => $cardId,
        ]);

        return new HoldGetCardId($response);
    }
}
