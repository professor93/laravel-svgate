<?php

namespace Uzbek\Svgate\Response;

use Uzbek\Svgate\Dtos\EposDto;

class TerminalGet extends BaseResponse
{
    public int $pid;
    public EposDto $dto;
    public string $username;
    public int $t_type;
    public int $terminal_type;
    public string $instId;
    public string $name;
    public int $noexp;
}
