<?php

namespace Uzbek\Svgate\Models;

use Uzbek\Svgate\Dtos\EposDto;
use Uzbek\Svgate\Response\BinList;
use Uzbek\Svgate\Response\TerminalCheck;
use Uzbek\Svgate\Response\TerminalGet;
use Uzbek\Svgate\Response\TerminalRemove;

class Terminal extends BaseModel
{
    public function terminalCheck(EposDto $dto): TerminalCheck
    {
        $response = $this->sendRequest('terminal.check', [
            "terminal" => [
                "merchantId" => $dto->getMerchantId(),
                "terminalId" => $dto->getTerminalId(),
            ],
        ]);

        return new TerminalCheck($response);
    }

    public function terminalGet(EposDto $dto)
    {
        $response = $this->sendRequest('terminal.get', [
        ]);

        return new TerminalGet($response['content']);
    }

    public function terminalRemove(EposDto $dto): TerminalRemove
    {
        $response = $this->sendRequest('terminal.remove', [
            "terminal" => [
                "merchantId" => $dto->getMerchantId(),
                "terminalId" => $dto->getTerminalId(),
            ],
        ]);

        return new TerminalRemove($response);
    }

    public function getBinList(): BinList
    {
        $response = $this->sendRequest('get.bin.list', [
        ]);

        return new BinList($response);
    }
}
