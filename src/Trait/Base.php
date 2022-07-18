<?php

namespace Uzbek\Trait;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use Uzbek\Svgate\Exceptions\Exception;

trait Base
{
    private mixed $config;

    public function __construct()
    {
        $this->config = config('svgate');
    }

    public function sendRequest(string $method, array $params)
    {
        $url = $this->config['svgate_base_url'];
        $preparedParams = $this->prepareRequestParams($method, $params);

        return Http::withHeaders([
            'Content-Type' => 'application/json; charset=utf-8',
            'Accept' => 'application/json',
            'Authorization' => Base64::encode($this->config['svgate_login'] . ':' . $this->config['svgate_password']),
        ])->post($url, $preparedParams)
            ->throw(function ($response, $e) {
                throw new Exception($response->getBody()->getContents(), $response->status());
//                match ($response->status()) {
//                    -200 => throw new Exception('Card not found', -200),
//                    -201 => throw new Exception('Card expired, capture card!', -201),
//                    -202 => throw new Exception('Pan invalid, wrong format!', -202),
//                    -100 => throw new Exception('Empty parameters!', -100),
//                    -101 => throw new Exception('Error while executing the request, try again!', -101),
//                    -102 => throw new Exception('Error while executing the request, try again!', -102),
//                    -103 => throw new Exception('Checkout required fields!', -103),
//                    -199 => throw new Exception('JsonRpc ERROR', -199),
//                    -203 => throw new Exception('Card not re-issue!', -203),
//                    -204 => throw new Exception('Card status is not active!', -204),
//                    -205 => throw new Exception('Card blocked!', -205),
//                };
            })
            ->json('result');
    }

    public function prepareRequestParams($method, $params)
    {
        return [
            'jsonrpc' => '2.0',
            'method' => $method,
            'id' => Str::random(40),
            'params' => $params,
        ];
    }
}
