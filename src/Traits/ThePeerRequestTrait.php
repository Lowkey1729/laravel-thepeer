<?php

namespace Loki1729\LaravelThePeer\Traits;

use Illuminate\Support\Facades\Http;

trait ThePeerRequestTrait
{
    public function post(string $url, array $payload): array
    {
        $result = Http::post($url, $payload);
        return $this->response($result);
    }

    public function get(string $url): array
    {
        $result = Http::get($url);
        return $this->response($result);
    }

    public function response($res): array
    {
        return $res->json();
    }

}