<?php

namespace Oakdigital\DawaPhp\Entities\BBR;

class BBRBuilding extends BBREntity
{
    private $case_number;
    private int $building_use_code;

    private int $build_year                 = 0;
    private int $renovation_year            = 0;

    private int $building_area              = 0;
    private int $building_habitable_area    = 0;
    private int $building_corporate_area    = 0;
    private int $building_built_area        = 0;
    private int $building_garage_area       = 0;
    private int $building_carport_area      = 0;
    private int $building_outhouse_area     = 0;
    private int $building_conservatory_area = 0;

    private int $building_floor_count       = 0;

    private $building_preservation_code;
    private $building_preservation_status;

    private $building_tenancy;
    private int $building_rent = 0;

    private string $building_point_id;

    /**
     * @param array $data
     * @return BBRBuilding
     */
    public function set($data)
    {
        foreach ($data as $data_key => $data_line) {
            // var_dump(['key' => $data_key, 'value' => $data_line]);

            switch ($data_key) {
                case 'Bygning_id':
                    $this->entity_id = $data_line;
                    unset($data[$data_key]);
                    break;
                case 'Byggesag_id':
                    $this->case_number = $data_line;
                    unset($data[$data_key]);
                    break;
                case 'BYG_ANVEND_KODE':
                    $this->building_use_code = intval($data_line);
                    unset($data[$data_key]);
                    break;
                case 'OPFOERELSE_AAR':
                    $this->build_year = intval($data_line);
                    unset($data[$data_key]);
                    break;
                case 'OMBYG_AAR':
                    $this->renovation_year = intval($data_line);
                    unset($data[$data_key]);
                    break;
                case 'BYG_ARL_SAML':
                    $this->building_area = intval($data_line);
                    unset($data[$data_key]);
                    break;
                case 'BYG_BOLIG_ARL_SAML':
                    $this->building_habitable_area = intval($data_line);
                    unset($data[$data_key]);
                    break;
                case 'ERHV_ARL_SAML':
                    $this->building_corporate_area = intval($data_line);
                    unset($data[$data_key]);
                    break;
                case 'BYG_BEBYG_ARL':
                    $this->building_built_area = intval($data_line);
                    unset($data[$data_key]);
                    break;
                case 'GARAGE_INDB_ARL':
                    $this->building_garage_area = intval($data_line);
                    unset($data[$data_key]);
                    break;
                case 'CARPORT_INDB_ARL':
                    $this->building_carport_area = intval($data_line);
                    unset($data[$data_key]);
                    break;
                case 'UDHUS_INDB_ARL':
                    $this->building_outhouse_area = intval($data_line);
                    unset($data[$data_key]);
                    break;
                case 'UDESTUE_ARL':
                    $this->building_conservatory_area = intval($data_line);
                    unset($data[$data_key]);
                    break;
                case 'ETAGER_ANT':
                    $this->building_floor_count = intval($data_line);
                    unset($data[$data_key]);
                    break;
                case 'FREDNING_KODE':
                    $this->building_preservation_code = $data_line;
                    unset($data[$data_key]);
                    break;
                case 'BevarVaerdig':
                    $this->building_preservation_status = $data_line;
                    unset($data[$data_key]);
                    break;
                case 'UdlejForhold1':
                    $this->building_tenancy = $data_line;
                    unset($data[$data_key]);
                    break;
                case 'HusLeje':
                    $this->building_rent = intval($data_line);
                    unset($data[$data_key]);
                    break;
                case 'bygningspunkt':
                    if (isset($data_line['BygPkt_id'])) $this->building_point_id = $data_line['BygPkt_id'];
                    unset($data[$data_key]);
                    break;
            }
        }

        return parent::set($data);
    }

    public function getCaseNumber()
    {
        return $this->case_number;
    }

    public function getBuildingUseCode()
    {
        return $this->building_use_code;
    }

    public function getBuildYear()
    {
        return $this->build_year;
    }

    public function getRenovationYear()
    {
        return $this->renovation_year;
    }

    public function getBuildingArea()
    {
        return $this->building_area;
    }

    public function getBuildingHabitableArea()
    {
        return $this->building_habitable_area;
    }

    public function getBuildingCorporateArea()
    {
        return $this->building_corporate_area;
    }

    public function getBuildingBuiltArea()
    {
        return $this->building_built_area;
    }

    public function getBuildingGarageArea()
    {
        return $this->building_garage_area;
    }

    public function getBuildingCarportArea()
    {
        return $this->building_carport_area;
    }

    public function getBuildingOuthouseArea()
    {
        return $this->building_outhouse_area;
    }

    public function getBuildingConservatoryArea()
    {
        return $this->building_conservatory_area;
    }

    public function getBuildingFloorCount()
    {
        return $this->building_floor_count;
    }

    public function getBuildingPreservationCode()
    {
        return $this->building_preservation_code;
    }

    public function getBuildingPreservationStatus()
    {
        return $this->building_preservation_status;
    }

    public function getBuildingTenancy()
    {
        return $this->building_tenancy;
    }

    public function getBuildingRent()
    {
        return $this->building_rent;
    }

    public function getBuildingPointID()
    {
        return $this->building_point_id;
    }

    protected function getAssocData()
    {
        return parent::getAssocData() + [
            'case_number' => $this->case_number,
            'building_use_code' => $this->building_use_code,
            'build_year' => $this->build_year,
            'renovation_year' => $this->renovation_year,
            'building_area' => $this->building_area,
            'building_habitable_area' => $this->building_habitable_area,
            'building_corporate_area' => $this->building_corporate_area,
            'building_built_area' => $this->building_built_area,
            'building_garage_area' => $this->building_garage_area,
            'building_carport_area' => $this->building_carport_area,
            'building_outhouse_area' => $this->building_outhouse_area,
            'building_conservatory_area' => $this->building_conservatory_area,
            'building_floor_count' => $this->building_floor_count,
            'building_preservation_code' => $this->building_preservation_code,
            'building_preservation_status' => $this->building_preservation_status,
            'building_tenancy' => $this->building_tenancy,
            'building_rent' => $this->building_rent,
            'building_point_id' => $this->building_point_id
        ];
    }
}
