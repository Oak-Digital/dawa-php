<?php

declare(strict_types=1);

require 'vendor/autoload.php';


use Oakdigital\DawaPhp\DawaAPI;
use PHPUnit\Framework\TestCase;

final class AddressSearchTest extends TestCase
{

    private DawaAPI $api;

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $this->api = new DawaAPI();
    }


    public function testEmptyQuery(): void
    {
        $addresses = $this->api->searchAddress('', 1, 1);
        $this->assertFalse($addresses, 'Test Search with empty query');
    }

    public function testNumberQuery(): void
    {
        $addresses = $this->api->searchAddress('1234567890', 1, 1);
        $this->assertEmpty($addresses, 'Test Search with numbers query');
    }

    public function testGarbageQuery(): void
    {
        $addresses = $this->api->searchAddress('fsagsdfgwersecvxcvxcvergsdfsdf', 1, 1);
        $this->assertEmpty($addresses, 'Test Search with garbage 1 query');
    }

    public function testGarbageQuery2(): void
    {
        $addresses = $this->api->searchAddress('äªß¬œπ∂∑œ¬∆ß¬∂', 1, 1);
        $this->assertIsArray($addresses, 'Test Search with garbage 2 query');
    }

    public function testNormalQuery(): void
    {
        $addresses = $this->api->searchAddress('Mikkel Bryggers gade 1', 1, 1);
        $this->assertInstanceOf(
            'Oakdigital\DawaPhp\Entities\Address\Address',
            $addresses[0],
            'Test if an address is returned with query: "Mikkel Bryggers gade 1"'
        );
    }

    public function testPagedQuery(): void
    {
        $addresses = $this->api->searchAddress('Skovvej');

        $this->assertCount(
            10,
            $addresses,
            'Test if the correct number of results are returned'
        );
    }

    public function testPagedQuery2(): void
    {
        $addresses = $this->api->searchAddress('Skovvej', 2, 5);

        $this->assertCount(
            5,
            $addresses,
            'Test if the correct number of results are returned 2'
        );
    }

    public function testPagedQuery3(): void
    {
        $addresses = $this->api->searchAddress('Skovvej');

        $this->assertContainsOnlyInstancesOf(
            'Oakdigital\DawaPhp\Entities\Address\Address',
            $addresses,
            'Test if the all returned items are Addresses'
        );
    }
}
