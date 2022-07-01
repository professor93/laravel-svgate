<?php

namespace Uzbek\Trait;


use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

trait Base
{
    private mixed $config;

    public function __construct()
    {
        $this->config = config('svgate');
    }

    public function sendRequest(string $method, array $params)
    {
        $url = $this->config['svgate_url'];
        $preparedParams = $this->prepareRequestParams($method, $params);

        return Http::withHeaders([
            'Content-Type' => 'application/json; charset=utf-8',
            'Accept' => 'application/json',
//            'Authorization'=> Base64::encode($this->config['svgate_login'] . ':' . $this->config['svgate_password'])
        ])->post($url, $preparedParams)
            ->throw(function ($response, $e) {
                throw new \Exception($response->json()['error']['message']);
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
