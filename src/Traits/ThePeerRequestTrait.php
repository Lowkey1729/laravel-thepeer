<?php

namespace Loki1729\LaravelThePeer\Traits;

use Illuminate\Support\Facades\Http;
use \Loki1729\LaravelThePeer\Traits\ThePeerConfigurationTrait;

trait ThePeerRequestTrait
{
    use ThePeerConfigurationTrait;

    protected function post(string $url, array $payload): array
    {
        $result = $this->httpClient()->post($url, $payload);
        return $this->response($result);
    }

    protected function put(string $url, array $payload): array
    {
        $result = $this->httpClient()->put($url, $payload);
        return $this->response($result);
    }

    protected function delete(string $url): array
    {
        $result = $this->httpClient()->delete($url);
        return $this->response($result);
    }

    protected function get(string $url): array
    {
        $result = $this->httpClient()->get($url);
        return $this->response($result);
    }

    protected function response($res): array
    {
        return $res->json();
    }

    protected function httpClient(): \Illuminate\Http\Client\PendingRequest
    {
        return Http::withHeaders($this->headers);
    }


}