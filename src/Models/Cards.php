<?php

namespace Uzbek\Svgate\Models;

use Uzbek\Svgate\Response\Balance;
use Uzbek\Svgate\Response\CardInfo;
use Uzbek\Svgate\Response\CardNew;
use Uzbek\Svgate\Response\CardsNewOtp;

class Cards extends BaseModel
{
    public const VALID_CARD = 0;
    public const CALL_ISSUER = 1;
    public const WARM_CARD = 2;
    public const DO_NOT_HONOR = 3;
    public const HONOR_WITH_ID = 4;
    public const NOT_PERMITTED = 5;
    public const LOST_CARD_CAPTURE = 6;
    public const STOLEN_CARD_CAPTURE = 7;
    public const CALL_SECURITY_CAPTURE = 8;
    public const INVALID_CARD_CAPTURE = 9;
    public const PICK_UP_CARD_SPECIAL_CONDITION = 10;
    public const CALL_ACQUIRER_SECURITY = 11;
    public const TEMPORARY_BLOCKED_BY_USER = 12;
    public const PIN_ATTEMPTS_EXCEEDED = 13;
    public const FORCED_PIN_CHANGE = 14;
    public const CREDIT_DEBTS = 15;
    public const UNKNOWN = 16;
    public const PIN_ACTIVATION = 17;
    public const INSTANT_CARD_PERSONIFICATION_WAITING = 18;
    public const FRAUD_PREVENTION = 19;
    public const PERMANENT_BLOCKED_BY_CLIENT = 20;
    public const TEMPORARY_BLOCKED_BY_CLIENT = 21;

    public function cardsNewOtp(string $pan, string $expiry): CardsNewOtp
    {
        $response = $this->svgate->sendRequest('cards.new.otp', [
            'card' => [
                'pan' => $pan,
                'expiry' => $expiry,
            ],
        ]);

        return new CardsNewOtp($response);
    }

    public function cardsNewVerify(string $id, string $code): CardNew
    {
        $response = $this->svgate->sendRequest('cards.new.verify', [
            'otp' => [
                'id' => $id,
                'code' => $code,
            ],
        ]);

        return new CardNew($response);
    }

    public function getByIds(array $ids): array
    {
        $response = $this->svgate->sendRequest('cards.get', [
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
        $response = $this->svgate->sendRequest('balance.get', [
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
}
