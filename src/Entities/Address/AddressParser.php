<?php

namespace Oakdigital\DawaPhp\Entities\Address;

use Exception;
use Oakdigital\DawaPhp\Entities\EntityParserInterface;
use Oakdigital\DawaPhp\Entities\Exceptions\ParseException;

class AddressParser implements EntityParserInterface
{
    private array $data;

    public function parse($data): Address
    {
        $this->data = $data;

        $addr = (object) [];
        $addr->entity_id = $this->getValue('id');
        $addr->status = $this->getValue('status');
        $addr->darStatus = $this->getValue('darstatus');
        $addr->addressString = $this->getValue('adressebetegnelse');

        // $addr->accessAddress = AccessAddress::fromData($data['adgangsadresse']);

        return $addr;
    }

    private function getValue(string $key)
    {
        if (!isset($this->data[$key])) throw new ParseException("Could not find key: " . $key);
        return $this->data[$key];
    }
}
