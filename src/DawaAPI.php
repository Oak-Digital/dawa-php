<?php

declare(strict_types=1);

namespace Oakdigital\DawaPhp;

use GuzzleHttp\Client;

class DawaAPI
{
    private Client $client;

    public function __construct()
    {
    }

    public function test(): string
    {
        error_log("Hello World!");
        return "Test";
    }
}
