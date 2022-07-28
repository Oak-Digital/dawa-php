<?php

use Oakdigital\DawaPhp\API\DawaAPI;
use Oakdigital\DawaPhp\API\APIError;

include 'vendor/autoload.php';

$api = new DawaAPI();



$addresses = $api->searchAddress('Mikkel Bryggers Gade 1');

var_dump($addresses);
