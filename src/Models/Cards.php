<?php

namespace Uzbek\Svgate\Models;

use Uzbek\Svgate\Response\Balance;
use Uzbek\Svgate\Response\CardInfo;
use Uzbek\Svgate\Response\CardNew;
use Uzbek\Svgate\Response\CardsNewOtp;

class Cards extends BaseModel
{
    public const STATUS_VALID_CARD = 0;
    public const STATUS_CALL_ISSUER = 1;
    public const STATUS_WARM_CARD = 2;
    public const STATUS_DO_NOT_HONOR = 3;
    public const STATUS_HONOR_WITH_ID = 4;
    public const STATUS_NOT_PERMITTED = 5;
    public const STATUS_LOST_CARD_CAPTURE = 6;
    public const STATUS_STOLEN_CARD_CAPTURE = 7;
    public const STATUS_CALL_SECURITY_CAPTURE = 8;
    public const STATUS_INVALID_CARD_CAPTURE = 9;
    public const STATUS_PICK_UP_CARD_SPECIAL_CONDITION = 10;
    public const STATUS_CALL_ACQUIRER_SECURITY = 11;
    public const STATUS_TEMPORARY_BLOCKED_BY_USER = 12;
    public const STATUS_PIN_ATTEMPTS_EXCEEDED = 13;
    public const STATUS_FORCED_PIN_CHANGE = 14;
    public const STATUS_CREDIT_DEBTS = 15;
    public const STATUS_UNKNOWN = 16;
    public const STATUS_PIN_ACTIVATION = 17;
    public const STATUS_INSTANT_CARD_PERSONIFICATION_WAITING = 18;
    public const STATUS_FRAUD_PREVENTION = 19;
    public const STATUS_PERMANENT_BLOCKED_BY_CLIENT = 20;
    public const STATUS_TEMPORARY_BLOCKED_BY_CLIENT = 21;

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

    public function getByIds(array $ids): CardInfo
    {
        $response = $this->sendRequest('cards.get', [
            'ids' => $ids,
        ]);

        return new CardInfo($response);
    }

    public function getBalance(array $ids): Balance
    {
        $response = $this->sendRequest('balance.get', [
            'ids' => $ids,
        ]);

        return new Balance($response);
    }
}
