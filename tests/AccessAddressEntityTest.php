<?php

declare(strict_types=1);

require 'vendor/autoload.php';


use Oakdigital\DawaPhp\API\DawaAPI;
use Oakdigital\DawaPhp\Entities\Address\AccessAddress;
use PHPUnit\Framework\TestCase;

final class AccessAddressEntityTest extends TestCase
{

    private DawaAPI $api;
    private string $address_id;

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $this->api = new DawaAPI();

        $this->address_id = '0a3f507a-c359-32b8-e044-0003ba298018';
    }

    public function testEmptyID(): void
    {
        $address = $this->api->getAccessAddressByID('');

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
        $address = $this->api->getAccessAddressByID('invalid_id');

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

    public function testIsAddress(): AccessAddress
    {
        $address = $this->api->getAccessAddressByID($this->address_id);

        $this->assertInstanceOf(
            'Oakdigital\DawaPhp\Entities\Address\AccessAddress',
            $address,
            'Test if returned is instance of Address'
        );

        // var_dump($address);


        return $address;
    }

    /**
     * @depends testIsAddress
     */
    public function testAccessAddressData(AccessAddress $address): void
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
    }

    /**
     * @depends testIsAddress
     */
    // public function testIsCorrectPostalCode(AccessAddress $address): void
    // {
    //     $this->assertEquals(
    //         '1460',
    //         $address->getPostalCode()->getCode(),
    //         'Test if AccesAddress contains correct postal code'
    //     );

    //     $this->assertEquals(
    //         'København K',
    //         $address->getPostalCode()->getName(),
    //         'Test if AccesAddress contains correct postal code name'
    //     );
    // }
}
