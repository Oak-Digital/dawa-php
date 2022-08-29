<?php

namespace Oakdigital\DawaPhp\Entities\BBR;

class BBRUnit extends BBREntity
{
    private int $vaerelse_ant;
    private int $vaer_erhv_ant;
    private int $ant_vandskyld_toiletter;
    private int $ant_badevaerelser;

    private $building_id;
    private $stairway_id;

    /**
     * @param array $data
     * @return BBRUnit
     */
    public function set($data)
    {
        foreach ($data as $data_key => $data_line) {
            switch ($data_key) {
                case 'Enhed_id':
                    $this->entity_id = $data_line;
                    unset($data[$data_key]);
                    break;
                case 'VAERELSE_ANT':
                    $this->vaerelse_ant = intval($data_line);
                    unset($data[$data_key]);
                    break;
                case 'VAER_ERHV_ANT':
                    $this->vaer_erhv_ant = intval($data_line);
                    unset($data[$data_key]);
                    break;
                case 'AntVandskylToilleter':
                    $this->ant_vandskyld_toiletter = intval($data_line);
                    unset($data[$data_key]);
                    break;
                case 'AntBadevaerelser':
                    $this->ant_badevaerelser = intval($data_line);
                    unset($data[$data_key]);
                    break;
                case 'bygning':
                    if (isset($data_line['Bygning_id'])) $this->building_id = $data_line['Bygning_id'];

                    unset($data[$data_key]);
                    break;
                case 'opgang':
                    if (isset($data_line['Opgang_id'])) $this->stairway_id = $data_line['Opgang_id'];

                    unset($data[$data_key]);
                    break;
            }
        }

        return parent::set($data);
    }

    public function getRoomCount()
    {
        return $this->vaerelse_ant;
    }

    public function getRoomCountCoorporate()
    {
        return $this->vaer_erhv_ant;
    }

    public function getToiletCount()
    {
        return $this->ant_vandskyld_toiletter;
    }

    public function getBathroomCount()
    {
        return $this->ant_badevaerelser;
    }

    public function getBuildingID()
    {
        return $this->building_id;
    }

    public function getStairwayID()
    {
        return $this->stairway_id;
    }

    protected function getAssocData()
    {
        return parent::getAssocData() + [
            'vaerelse_ant' => $this->vaerelse_ant,
            'vaer_erhv_ant' => $this->vaer_erhv_ant,
            'ant_vandskyld_toiletter' => $this->ant_vandskyld_toiletter,
            'ant_badevaerelser' => $this->ant_badevaerelser,
            'building_id' => $this->building_id,
            'stairway_id' => $this->stairway_id
        ];
    }
}
