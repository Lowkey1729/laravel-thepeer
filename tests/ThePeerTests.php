<?php

namespace Tests;


use Illuminate\Support\Facades\Http;
use Orchestra\Testbench\TestCase;
use Illuminate\Testing\Fluent\AssertableJson;

class ThePeerTests extends TestCase
{
    /**
     * @test
     */
    public function it_returns_validation_error()
    {
       Http::fake([
            ''
       ]);
//        $response->assertStatus(422);
//        $response->assertJsonValidationErrors();
    }
}