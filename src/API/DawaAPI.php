<?php

declare(strict_types=1);

namespace Oakdigital\DawaPhp\API;

use Exception;
use Oakdigital\DawaPhp\Entities\Address\AccessAddress;
use Oakdigital\DawaPhp\Entities\Address\Address;
use Oakdigital\DawaPhp\API\APIError;
use Oakdigital\DawaPhp\Entities\Address\AddressParser;
use Oakdigital\DawaPhp\Entities\BBR\BBRBuilding;
use Oakdigital\DawaPhp\Entities\BBR\BBRUnit;
use Oakdigital\DawaPhp\Entities\Entity;

class DawaAPI extends APIBase
{
    private const BASE_URL = "https://api.dataforsyningen.dk/";

    public function __construct($base_url = '')
    {
        if (empty($base_url)) $base_url = self::BASE_URL;
        parent::__construct($base_url);
    }


    public function searchAddress(string $query, $page = 1, $per_page = 10): array|false
    {
        if (!$query) return false;

        $response = $this->resolve('/adresser', 'GET', [
            'query' => [
                'side' => $page,
                'per_side' => $per_page,
                // 'fuzzy' => 'true',
                'q' => $query
            ]
        ]);

        if (APIError::isError($response)) return false;

        $addresses = [];

        $content_json = $response->getBody()->getContents();
        $content_assoc = json_decode($content_json, true);

        if (!$content_assoc || $content_assoc == null) return false;

        foreach ($content_assoc as $item) {
            $address = new Address();
            $address->set($item);
            array_push($addresses, $address);
        }

        return $addresses;
    }

    public function getAddressByID(string $addressID): Address
    {
        if (empty($addressID)) return new APIError('invalid_id');

        try {
            $response = $this->client->request('GET', '/adresser/' . $addressID);
        } catch (Exception $e) {
            return new APIError($e->getCode(), $e->getMessage());
        }

        $content_json = $response->getBody()->getContents();

        return new Address($content_json);
    }

    public function getAccessAddressByID(string $addressID): AccessAddress
    {
        if (empty($addressID)) return new APIError('invalid_id');

        try {
            $response = $this->client->request('GET', '/adgangsadresser/' . $addressID);
        } catch (Exception $e) {
            return new APIError($e->getCode(), $e->getMessage());
        }

        $content_json = $response->getBody()->getContents();

        return new AccessAddress($content_json);
    }

    public function getBBRUnitByID(string $unit_id): BBRUnit|APIError
    {
        if (empty($unit_id)) return new APIError('invalid_id');

        try {
            $response = $this->client->request('GET', '/bbrlight/enheder/' . $unit_id);
        } catch (Exception $e) {
            return new APIError($e->getCode(), $e->getMessage());
        }

        $content_json = $response->getBody()->getContents();

        return new BBRUnit($content_json);
    }

    public function getBBRBuildingByID(string $building_id): BBRBuilding|APIError
    {
        if (empty($building_id)) return new APIError('invalid_id');

        try {
            $response = $this->client->request('GET', '/bbrlight/bygninger/' . $building_id);
        } catch (Exception $e) {
            return new APIError($e->getCode(), $e->getMessage());
        }

        $content_json = $response->getBody()->getContents();

        return new BBRBuilding($content_json);
    }

    public function getEntityByIDAndDomain(string $entity_id, string $domain): Entity|APIError
    {
        if (empty($entity_id)) return new APIError('invalid_id');

        $domain_formatted = trim($domain, '/');

        try {
            $response = $this->client->request('GET', "/$domain_formatted/$entity_id");
        } catch (Exception $e) {
            return new APIError($e->getCode(), $e->getMessage());
        }

        $content_json = $response->getBody()->getContents();

        return new Entity($content_json);
    }
}
