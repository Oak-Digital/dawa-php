<?php

declare(strict_types=1);

namespace Oakdigital\DawaPhp\API;

use Exception;
use Oakdigital\DawaPhp\Entities\Address\AccessAddress;
use Oakdigital\DawaPhp\Entities\Address\Address;
use Oakdigital\DawaPhp\API\APIError;
use Oakdigital\DawaPhp\Entities\Address\AddressParser;

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

        var_dump($response);

        if (APIError::isError($response)) return false;

        $addresses = [];

        $content_json = $response->getBody()->getContents();
        $content_assoc = json_decode($content_json, true);

        if (!$content_assoc || $content_assoc == null) return false;

        $parser = new AddressParser();

        foreach ($content_assoc as $item) {
            $address = $parser->parse($item);
            array_push($addresses, $address);
        }

        return $addresses;
    }

    // public function getAddressByID(string $addressID): Address|APIError
    // {
    //     if (empty($addressID)) return new APIError('invalid_id');

    //     $content_assoc = null;

    //     try {
    //         $response = $this->client->request('GET', '/adresser/' . $addressID);
    //         $content_json = $response->getBody()->getContents();
    //         $content_assoc = json_decode($content_json);
    //     } catch (Exception $e) {
    //         return new APIError($e->getCode(), $e->getMessage());
    //     }

    //     if (!$content_assoc || $content_assoc == null) return new APIError('no_body');

    //     return Address::fromJsonData($content_assoc);
    // }

    // public function getAccessAddressByID(string $addressID): AccessAddress|APIError
    // {
    //     if (empty($addressID)) return new APIError('invalid_id');



    //     // $content_json = $response->getBody()->getContents();
    //     // $content_assoc = json_decode($content_json);

    //     // if (!$content_assoc || $content_assoc == null) return new APIError('no_body');

    //     // return AccessAddress::fromData($content_assoc);
    // }
}
