<?php

namespace Uzbek\Svgate\Response;

class TerminalCheck extends BaseResponse
{
    public string $username;
    public int $port;
    public string $name;
    public int $type;
}
