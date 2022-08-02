<?php

namespace Tests;


use Illuminate\Support\Facades\Http;
use Loki1729\LaravelThePeer\Services\ThePeer;
use Orchestra\Testbench\TestCase;
use Illuminate\Testing\Fluent\AssertableJson;

class ThePeerTests extends TestCase
{
    protected $client;

    protected function setUp(): void
    {
        parent::setUp();
        $this->client = new ThePeer();
    }


}