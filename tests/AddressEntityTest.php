<?php

declare(strict_types=1);

require 'vendor/autoload.php';


use Oakdigital\DawaPhp\API\DawaAPI;
use Oakdigital\DawaPhp\Entities\Address\Address;
use PHPUnit\Framework\TestCase;

final class AddressEntityTest extends TestCase
{

    private DawaAPI $api;
    private string $address_id;

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $this->api = new DawaAPI();

        $this->address_id = '2183dc88-dcbb-4202-a5d2-493f9d7ea4c2';
    }

    public function testEmptyID(): void
    {
        $address = $this->api->getAddressByID('');

        $this->assertInstanceOf(
            'Oakdigital\DawaPhp\Utility\APIError',
            $address,
            'Test if an APIError is returned on empty input'
        );

        $this->assertEquals(
            'invalid_id',
            $address->getErrorCode(),
            'Test if the APIError has the correct code'
        );
    }

    public function testInvalidID(): void
    {
        $address = $this->api->getAddressByID('invalid_id');

        $this->assertInstanceOf(
            'Oakdigital\DawaPhp\Utility\APIError',
            $address,
            "Test if the returned is an APIError"
        );

        $this->assertEquals(
            404,
            $address->getErrorCode(),
            'Test if the error code is 404'
        );
    }

    public function testIsAddress(): Address
    {
        $address = $this->api->getAddressByID($this->address_id);

        $this->assertInstanceOf(
            'Oakdigital\DawaPhp\Entities\Address\Address',
            $address,
            'Test if returned is instance of Address'
        );

        return $address;
    }

    /**
     * @depends testIsAddress
     */
    public function testAddressData(Address $address)
    {
        $this->assertEquals(
            $this->address_id,
            $address->getID(),
            'Test if address has been assigned the correct ID'
        );

        $this->assertEquals(
            'Mikkel Bryggers Gade 1, 1460 København K',
            $address->getAddress(),
            'Test if address has been assigned the correct Address'
        );

        $this->assertEquals(
            1,
            $address->getStatus(),
            'Test if address has been assigned the correct status'
        );
    }

    /**
     * @depends testIsAddress
     */
    public function testHasAccessAddr(Address $address)
    {
        $this->assertInstanceOf(
            'Oakdigital\DawaPhp\Entities\Address\AccessAddress',
            $address->getAccessAddress(),
            'Test if address contains an AccessAddress'
        );
    }
}
