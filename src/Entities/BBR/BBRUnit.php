<?php

namespace Oakdigital\DawaPhp\Entities\BBR;

class BBRUnit extends BBREntity
{
    private int $room_count;
    private int $room_count_corp;
    private int $toilet_count;
    private int $bathroom_count;

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
                    $this->room_count = intval($data_line);
                    unset($data[$data_key]);
                    break;
                case 'VAER_ERHV_ANT':
                    $this->room_count_corp = intval($data_line);
                    unset($data[$data_key]);
                    break;
                case 'AntVandskylToilleter':
                    $this->toilet_count = intval($data_line);
                    unset($data[$data_key]);
                    break;
                case 'AntBadevaerelser':
                    $this->bathroom_count = intval($data_line);
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
        return $this->room_count;
    }

    public function getRoomCountCoorporate()
    {
        return $this->room_count_corp;
    }

    public function getToiletCount()
    {
        return $this->toilet_count;
    }

    public function getBathroomCount()
    {
        return $this->bathroom_count;
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
            'room_count' => $this->room_count,
            'room_count_corp' => $this->room_count_corp,
            'toilet_count' => $this->toilet_count,
            'bathroom_count' => $this->bathroom_count,
            'building_id' => $this->building_id,
            'stairway_id' => $this->stairway_id
        ];
    }
}
