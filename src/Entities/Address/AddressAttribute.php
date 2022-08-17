<?php

namespace Oakdigital\DawaPhp\Entities\Address;

use Oakdigital\DawaPhp\Entities\Entity;

class AddressAttribute extends Entity
{
    protected string $code;
    protected string $name;

    /**
     * @param array $data
     * @return AddressAttribute
     */
    public function set($data)
    {
        foreach ($data as $data_key => $data_line) {
            switch ($data_key) {
                case 'navn':
                    $this->name = $data_line;
                    break;

                case 'id':
                case 'kode':
                case 'nr':
                case 'nummer':
                case 'bogstav':
                case 'nuts3':
                case 'matrikelnr':
                    $this->entity_id = $data_line;
                    break;
            }
        }

        return parent::set($data);
    }

    public function setCode(string $code)
    {
        $this->code = $code;
        return $this;
    }

    public function getCode(): string
    {
        return $this->code;
    }

    public function setName(string $name)
    {
        $this->name = $name;
        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }
}
