<?php

declare(strict_types=1);

require 'vendor/autoload.php';


use Oakdigital\DawaPhp\DawaAPI;
use PHPUnit\Framework\TestCase;

final class DawaAPITest extends TestCase
{

    private DawaAPI $api;

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $this->api = new DawaAPI();
    }

    public function testSearch(): void
    {
        $this->assertEquals(
            'Test',
            $this->api->test(),
            'Hello World!'
        );
    }
}
