<?php

namespace Oakdigital\DawaPhp\Entities\Address;

use Oakdigital\DawaPhp\Entities\Entity;

class Address extends Entity
{
    protected int $status;
    protected int $darStatus;

    protected string $addressString;
    protected string $story;
    protected string $doorNumber;

    protected AccessAddress $accessAddress;


    public function getAddress(): string
    {
        return $this->addressString;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function getAccessAddress(): AccessAddress
    {
        return $this->accessAddress;
    }
}
