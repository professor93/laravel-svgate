<?php

namespace Uzbek\Svgate\Models;

use Uzbek\Svgate\Response\CardNew;
use Uzbek\Svgate\Response\CardsNewOtp;

class Cards extends BaseModel
{
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
}
