<?php

namespace Loki1729\LaravelThePeer;

use Loki1729\LaravelThePeer\Services\ThePeer;

class ThePeerFacadeAccessor
{
    public $provider;

    public function setProvider()
    {
        $this->provider = resolve(ThePeer::class);
        return $this;
    }

    public function getProvider()
    {
        return $this->provider;
    }


}