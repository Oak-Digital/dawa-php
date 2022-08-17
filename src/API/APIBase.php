<?php

namespace Oakdigital\DawaPhp\API;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Psr7\Response;

class APIBase
{
    protected Client $client;

    public function __construct($base_url)
    {
        $this->client = new Client(['base_uri' => $base_url]);
    }

    public function resolve(string $address, string $method = 'GET', array $options = [])
    {
        try {
            return $this->client->request($method, $address, $options);
        } catch (GuzzleException $e) {
            return new APIError($e->getCode(), $e->getMessage());
        }
    }
}
