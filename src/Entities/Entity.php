<?php

namespace Oakdigital\DawaPhp\Entities;

class Entity
{
    protected string $entity_id;
    protected array $domain = [];

    protected array $data = [];

    public function __construct($json = false)
    {
        if ($json) $this->set(json_decode($json, true));
    }

    /**
     * Set data from associative array
     *
     * @param array $data
     * @return Entity
     */
    public function set(array $data): Entity
    {
        foreach ($data as $data_key => $data_line) {
            switch ($data_key) {
                case 'id':
                    $this->entity_id = $data_line;
                    break;

                case 'href':
                    $this->setDomain($data_line);
                    break;

                default:
                    // Load in the rest of the data
                    $this->data[$data_key] = $data_line;
            }
        }

        return $this;
    }


    public function getID()
    {
        return $this->entity_id;
    }


    public static function fromID(string $id)
    {
    }


    /**
     * Get some data by key, returns null if key is not a member of the object
     *
     * @param string $key
     * @return mixed|false
     */
    public function getDataByKey(string $key): mixed
    {
        if (isset($this->data[$key])) return $this->data[$key];
        return null;
    }



    /**
     * Get the path to the resource
     *
     * @return string
     */
    public function getPath(): null|string
    {
        if (empty($this->domain)) return null;

        $res = "";

        foreach ($this->domain as $i) {
            $res .= '/' . $i;
        }

        return $res . '/' . $this->entity_id;
    }



    private function setDomain($domain_string): void
    {
        $params = explode('/', str_replace('https://api.dataforsyningen.dk/', '', trim($domain_string, '/')));

        array_pop($params);

        foreach ($params as $value) {
            array_push($this->domain, $value);
        }
    }
}
