<?php

namespace Loki1729\LaravelThePeer\Traits;

use http\Exception;
use http\Exception\RuntimeException;

trait ThePeerConfigurationTrait
{
    protected array $config;

    protected string $mode = 'live';

    protected array $headers = [];

    protected string $baseUrl = '';

    protected function setConfig(array $config): void
    {
        $config = function_exists('config') && !empty(config('loki_the_peer')) ? config('loki_the_peer') : $config;
    }

    public function setHeaders(array $header_params): self
    {
        foreach ($header_params as $key => $header_param) {
            $this->headers[] = [$key => $header_param];
        }

        return $this;

    }

    protected function setApiEnvironment(string $mode): void
    {
        $mode ? $this->setMode($mode) : $this->ifConfigurationIsInvalid();
    }

    protected function setMode($mode): void
    {
        $this->mode = !in_array($mode, ['live', 'test']) ? 'live' : 'test';
    }


    protected function ifConfigurationIsInvalid(): Exception
    {
        throw new RuntimeException('Invalid credentials provided. Please, provide a valid Thepeer credentials. You can refer to your Thepeer dashboard for clarity.');
    }

    public function setCredentials(array $credentials): void
    {

    }
}