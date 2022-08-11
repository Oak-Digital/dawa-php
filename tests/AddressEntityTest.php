<?php

declare(strict_types=1);

require 'vendor/autoload.php';


use Oakdigital\DawaPhp\API\DawaAPI;
use Oakdigital\DawaPhp\Entities\Address\AccessAddress;
use Oakdigital\DawaPhp\Entities\Address\Address;
use PHPUnit\Framework\TestCase;

final class AddressEntityTest extends TestCase
{
    private string $json_data;

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);

        $this->json_data = '{
            "id": "2183dc88-dcbb-4202-a5d2-493f9d7ea4c2",
            "kvhx": "01014748___1_______",
            "status": 1,
            "darstatus": 3,
            "href": "https://api.dataforsyningen.dk/adresser/2183dc88-dcbb-4202-a5d2-493f9d7ea4c2",
            "historik": {
              "oprettet": "2014-05-05T19:07:48.577",
              "ændret": "2014-05-05T19:07:48.577",
              "ikrafttrædelse": "2014-05-05T19:07:48.577",
              "nedlagt": null
            },
            "etage": null,
            "dør": null,
            "adressebetegnelse": "Mikkel Bryggers Gade 1, 1460 København K",
            "adgangsadresse": {
              "href": "https://api.dataforsyningen.dk/adgangsadresser/0a3f507a-c359-32b8-e044-0003ba298018",
              "id": "0a3f507a-c359-32b8-e044-0003ba298018",
              "adressebetegnelse": "Mikkel Bryggers Gade 1, 1460 København K",
              "kvh": "01014748___1",
              "status": 1,
              "darstatus": 3,
              "vejstykke": {
                "href": "https://api.dataforsyningen.dk/vejstykker/101/4748",
                "navn": "Mikkel Bryggers Gade",
                "adresseringsnavn": "Mikkel Bryggers Gade",
                "kode": "4748"
              },
              "husnr": "1",
              "navngivenvej": {
                "href": "https://api.dataforsyningen.dk/navngivneveje/a602a004-0a9a-4ff5-88e4-9940620cbd76",
                "id": "a602a004-0a9a-4ff5-88e4-9940620cbd76"
              },
              "supplerendebynavn": null,
              "supplerendebynavn2": null,
              "postnummer": {
                "href": "https://api.dataforsyningen.dk/postnumre/1460",
                "nr": "1460",
                "navn": "København K"
              },
              "stormodtagerpostnummer": null,
              "kommune": {
                "href": "https://api.dataforsyningen.dk/kommuner/0101",
                "kode": "0101",
                "navn": "København"
              },
              "ejerlav": {
                "kode": 2000178,
                "navn": "Vester Kvarter, København"
              },
              "esrejendomsnr": "153169",
              "matrikelnr": "13",
              "historik": {
                "oprettet": "2009-11-25T01:07:37.000",
                "ændret": "2018-07-04T18:00:00.000",
                "ikrafttrædelse": "2009-11-25T01:07:37.000",
                "nedlagt": null
              },
              "adgangspunkt": {
                "id": "0a3f507a-c359-32b8-e044-0003ba298018",
                "koordinater": [
                  12.57091553,
                  55.67678895
                ],
                "højde": 5.9,
                "nøjagtighed": "A",
                "kilde": 5,
                "tekniskstandard": "TD",
                "tekstretning": 200,
                "ændret": "2016-08-25T00:00:00.000"
              },
              "vejpunkt": {
                "id": "11e9ab92-af45-11e7-847e-066cff24d637",
                "kilde": "Ekstern",
                "nøjagtighed": "B",
                "tekniskstandard": "V0",
                "koordinater": [
                  12.57081568,
                  55.67675543
                ],
                "ændret": "2018-05-03T14:08:02.125"
              },
              "DDKN": {
                "m100": "100m_61758_7245",
                "km1": "1km_6175_724",
                "km10": "10km_617_72"
              },
              "sogn": {
                "href": "https://api.dataforsyningen.dk/sogne/7002",
                "kode": "7002",
                "navn": "Helligånds"
              },
              "region": {
                "href": "https://api.dataforsyningen.dk/regioner/1084",
                "kode": "1084",
                "navn": "Region Hovedstaden"
              },
              "landsdel": {
                "href": "https://api.dataforsyningen.dk/landsdele/DK011",
                "nuts3": "DK011",
                "navn": "Byen København"
              },
              "retskreds": {
                "href": "https://api.dataforsyningen.dk/retskredse/1101",
                "kode": "1101",
                "navn": "Københavns Byret"
              },
              "politikreds": {
                "href": "https://api.dataforsyningen.dk/politikredse/1470",
                "kode": "1470",
                "navn": "Københavns Politi"
              },
              "opstillingskreds": {
                "href": "https://api.dataforsyningen.dk/opstillingskredse/0003",
                "kode": "0003",
                "navn": "Indre By"
              },
              "afstemningsområde": {
                "href": "https://api.dataforsyningen.dk/afstemningsomraader/101/11",
                "nummer": "11",
                "navn": "3. Indre By"
              },
              "storkreds": {
                "href": "https://api.dataforsyningen.dk/storkredse/1",
                "nummer": "1",
                "navn": "København"
              },
              "valglandsdel": {
                "href": "https://api.dataforsyningen.dk/valglandsdele/A",
                "bogstav": "A",
                "navn": "Hovedstaden"
              },
              "zone": "Byzone",
              "jordstykke": {
                "href": "https://api.dataforsyningen.dk/jordstykker/2000178/13",
                "ejerlav": {
                  "kode": 2000178,
                  "navn": "Vester Kvarter, København",
                  "href": "https://api.dataforsyningen.dk/ejerlav/2000178"
                },
                "matrikelnr": "13",
                "esrejendomsnr": "153169"
              },
              "bebyggelser": [
                {
                  "id": "12337669-d99e-6b98-e053-d480220a5a3f",
                  "kode": null,
                  "type": "bydel",
                  "navn": "Indre By",
                  "href": "https://api.dataforsyningen.dk/bebyggelser/12337669-d99e-6b98-e053-d480220a5a3f"
                },
                {
                  "id": "290f85b8-8c7a-6fd1-e053-d480220af996",
                  "kode": 18368,
                  "type": "by",
                  "navn": "København",
                  "href": "https://api.dataforsyningen.dk/bebyggelser/290f85b8-8c7a-6fd1-e053-d480220af996"
                }
              ],
              "brofast": true
            }
          }';
    }

    public function testCreateAddressFromJson()
    {
        $address = new Address($this->json_data);

        $this->assertInstanceOf(
            'Oakdigital\DawaPhp\Entities\Address\Address',
            $address,
            ''
        );

        return $address;
    }

    /**
     * @depends testCreateAddressFromJson
     */
    public function testAddressData(Address $address)
    {

        // ID
        $this->assertEquals(
            '2183dc88-dcbb-4202-a5d2-493f9d7ea4c2',
            $address->getID()
        );

        // Path
        $this->assertEquals(
            '/adresser/2183dc88-dcbb-4202-a5d2-493f9d7ea4c2',
            $address->getPath()
        );

        // Address
        $this->assertEquals(
            'Mikkel Bryggers Gade 1, 1460 København K',
            $address->getAddress(),
        );

        // Status
        $this->assertEquals(
            1,
            $address->getStatus()
        );

        // Darstatus
        $this->assertEquals(
            3,
            $address->getDarstatus()
        );

        // Floor
        $this->assertNull(
            $address->getFloor()
        );

        // Door
        $this->assertNull(
            $address->getDoor()
        );
    }

    /**
     * @depends testCreateAddressFromJson
     */
    public function testHasAccessAddress(Address $address)
    {
        $accessAddress = $address->getAccessAddress();

        $this->assertInstanceOf(
            'Oakdigital\DawaPhp\Entities\Address\AccessAddress',
            $accessAddress
        );

        return $accessAddress;
    }
}
