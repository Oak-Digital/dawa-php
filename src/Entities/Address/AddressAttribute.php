<?php

namespace Oakdigital\DawaPhp\Entities\Address;

use Oakdigital\DawaPhp\Entities\Entity;

class AddressAttribute
{
    protected array $domain = [];
    protected string $code;
    protected string $name;

    public function __construct($name, $href)
    {
        $this->name = $name;

        $params = explode('/', str_replace('https://api.dataforsyningen.dk/', '', trim($href, '/')));

        $this->code = array_pop($params);

        foreach ($params as $value) {
            array_push($this->domain, $value);
        }
    }

    public function getLink()
    {
        $res = "";

        foreach ($this->domain as $i) {
            $res .= '/' . $i;
        }

        return $res . '/' . $this->code;
    }
}
