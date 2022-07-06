<?php

namespace Uzbek\Svgate\Exceptions;

class JsonRpcError extends Exception
{
    public function jsonRpcError()
    {
        return new JsonRpcError('JsonRpc ERROR', -199);
    }
}
