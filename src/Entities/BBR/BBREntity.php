<?php

namespace Oakdigital\DawaPhp\Entities\BBR;

use Oakdigital\DawaPhp\Entities\Entity;

class BBREntity extends Entity
{
    protected int $ois_id;
    protected $ois_ts;

    protected int $ObjStatus;

    /**
     * @param array $data
     * @return BBREntity
     */
    public function set($data)
    {
        foreach ($data as $data_key => $data_line) {
            switch ($data_key) {
                case 'ois_id':
                case 'ObjStatus':
                    if (property_exists($this, $data_key)) {
                        $this->{$data_key} = intval($data_line);
                        unset($data[$data_key]);
                    }

                    break;
                case 'ois_ts':
                    if (property_exists($this, $data_key)) {
                        $this->{$data_key} = $data_line;
                        unset($data[$data_key]);
                    }

                    break;
            }
        }

        return parent::set($data);
    }

    public function getOisID()
    {
        return $this->ois_id;
    }

    public function getOisTs()
    {
        return $this->ois_ts;
    }

    public function getObjStatus()
    {
        return $this->ObjStatus;
    }
}
