<?php

namespace Loki1729\LaravelThePeer\Facades;

use Illuminate\Support\Facades\Facade;

class ThePeer extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'Loki1729\LaravelThePeer\ThePeerFacadeAccessor';
    }
}