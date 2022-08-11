<?php

namespace Oakdigital\DawaPhp\Entities\Address;

use Oakdigital\DawaPhp\Entities\Entity;

class Address extends Entity
{
    protected int $status;
    protected int $darstatus;

    protected string|null $adressebetegnelse;
    protected string|null $etage;
    protected string|null $dør;

    protected AccessAddress $accessAddress;


    public function set(array $data): Address
    {
        foreach ($data as $data_key => $data_line) {
            switch ($data_key) {
                case 'status':
                case 'darstatus':
                    if (property_exists($this, $data_key)) {
                        $this->{$data_key} = intval($data_line);
                        unset($data[$data_key]);
                    }
                    break;

                case 'adressebetegnelse':
                case 'etage':
                case 'dør':
                    if (property_exists($this, $data_key)) {
                        $this->{$data_key} = $data_line;
                        unset($data[$data_key]);
                    }
                    break;

                case 'adgangsadresse':
                    $this->accessAddress = new AccessAddress();
                    $this->accessAddress->set($data_line);
                    unset($data[$data_key]);
                    break;
            }
        }

        return parent::set($data);
    }

    public function getAddress(): string
    {
        return $this->adressebetegnelse;
    }

    public function getStatus(): int
    {
        return $this->status;
    }

    public function getDarstatus(): int
    {
        return $this->darstatus;
    }

    public function getFloor(): string|null
    {
        return $this->etage;
    }

    public function getDoor(): string|null
    {
        return $this->dør;
    }

    public function getAccessAddress(): AccessAddress
    {
        return $this->accessAddress;
    }
}
