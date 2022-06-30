<?php

namespace Uzbek\Svgate;

use Spatie\LaravelPackageTools\Package;
use Uzbek\Svgate\Commands\SvgateCommand;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class SvgateServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package->name('svgate')->hasConfigFile()
            ->hasCommand(SvgateCommand::class);

//        $config = config('svgate');
//        Http::macro('svgate', fn ($method, $params) => Http::baseUrl($config['svgate_base_url'])
//            ->post('api/v1/login', [
//                'jsonrpc' => '2.0',
//                'method' => $method,
//                'id' => Str::random(40),
//                'params' => $params,
//            ])->throw(function ($response, $e) {
//                throw new \Exception($response->json()['error']['message']);
//            })->json());

        $this->app->singleton(Svgate::class, function () {
            return new Svgate();
        });
    }
}
