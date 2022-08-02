<?php

namespace Loki1729\LaravelThePeer\Traits;

use http\Exception;
use http\Exception\RuntimeException;

trait ThePeerConfigurationTrait
{
    protected array $config = [];

    protected string $mode = 'live';

    protected array $headers = [];

    protected string $baseUrl = 'https://api.thepeer.co';

    protected function setConfig($secret_key = ''): self|\Exception
    {
        $this->config = function_exists('config') && !empty(config('loki_the_peer')) ? config('loki_the_peer') : [
            'mode' => $this->mode,
            'sandbox' => [
                'secret_key' => $secret_key,
            ],
            'live' => [
                'secret_key' => $secret_key
            ]
        ];

        return $this;
    }

    protected function setHeaders(): self
    {
        $this->headers['X-Api-Key'] = $this->config[$this->mode]['secret_key'];
        $this->headers['Accept'] = 'application/json';

        return $this;

    }

    protected function setMode($mode): self
    {
        $this->mode = !in_array($mode, ['live', 'sandbox']) ? 'live' : $mode;
        return $this;
    }


}