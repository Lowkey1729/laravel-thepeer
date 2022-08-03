<?php

namespace Loki1729\LaravelThePeer\ServiceProviders;

use Closure;
use Illuminate\Support\ServiceProvider;
use Loki1729\LaravelThePeer\Services\ThePeer;

class ThePeerServiceProvider extends ServiceProvider
{
    protected bool $defer = false;

    public function boot()
    {
        $this->publishes([__DIR__ . '/../..config/config.php' => config_path('loki_the_peer.php'),
        ]);
    }

    public function register()
    {
        $this->registerThePeer();

        $this->mergeConfig();
    }

    private function registerThePeer()
    {
        $this->app->singleton('the_peer_client', static function(){
            return new ThePeer();
        });
    }

    private function mergeConfig()
    {
        $this->mergeConfigFrom(__DIR__ . '/../../config/config.php', 'loki_the_peer');
    }



}