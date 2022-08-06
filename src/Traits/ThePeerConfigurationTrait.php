<?php

namespace Loki1729\LaravelThePeer\Traits;

use http\Exception;
use http\Exception\RuntimeException;

trait ThePeerConfigurationTrait
{
    protected array $config = [];

    protected string $mode = '';

    protected array $headers = [];

    protected string $baseUrl = 'https://api.thepeer.co';

    protected function setConfig($mode = null, $secret_key = null): self
    {
        $mode = trim($mode);
        $this->config = function_exists('config') && !empty(config('loki_the_peer') && is_null($mode)) ? config('loki_the_peer') : [
            'mode' => $mode,
            'sandbox' => [
                'secret_key' => $mode == 'sandbox' ? $secret_key : '',
            ],
            'live' => [
                'secret_key' => $mode == 'live' ? $secret_key : ''
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
        if (is_null($mode)) {
            $mode = $this->config['mode'];
        }
        $this->mode = !in_array($mode, ['live', 'sandbox']) ? 'live' : $mode;
        return $this;
    }


}