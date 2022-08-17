<?php

namespace Oakdigital\DawaPhp\Entities\Address;

use Oakdigital\DawaPhp\Entities\Entity;

class Address extends Entity
{
    protected int $status;
    protected int $darstatus;

    protected $adressebetegnelse;
    protected $etage;
    protected $dør;

    protected $accessAddress = null;


    public function set(array $data)
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

    public function getAddress()
    {
        return $this->adressebetegnelse;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function getDarstatus()
    {
        return $this->darstatus;
    }

    public function getFloor()
    {
        return $this->etage;
    }

    public function getDoor()
    {
        return $this->dør;
    }

    public function getAccessAddress()
    {
        return $this->accessAddress;
    }

    protected function getAssocData()
    {
        return parent::getAssocData() + [
            'status' => $this->status,
            'darStatus' => $this->darstatus,
            'addresseBetegnelse' => $this->adressebetegnelse,
            'etage' => $this->etage,
            'dør' => $this->dør,
            'accessAddress' => !!$this->accessAddress ? $this->accessAddress->getAssocData() : null
        ];
    }
}
