<?php

namespace Oakdigital\DawaPhp\Entities\BBR;

class BBRBuilding extends BBREntity
{
    private string|null $case_number;
    private int $building_use_code;

    private int $build_year;
    private int $renovation_year;

    private int $building_area;
    private int $building_habitable_area;
    private int $building_corporate_area;
    private int $building_built_area;
    private int $building_garage_area;
    private int $building_carport_area;
    private int $building_outhouse_area;
    private int $building_conservatory_area;

    private int $building_floor_count;

    private string|null $building_preservation_code;
    private string|null $building_preservation_status;

    private string|null $building_tenancy;
    private int $building_rent;

    private string $building_point_id;

    public function set($data): BBRBuilding
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
                case 'UDESTUE_INDB_ARL':
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

    public function getCaseNumber(): string|null
    {
        return $this->case_number;
    }

    public function getBuildingUseCode(): int
    {
        return $this->building_use_code;
    }

    public function getBuildYear(): int
    {
        return $this->build_year;
    }

    public function getRenovationYear(): int
    {
        return $this->renovation_year;
    }

    public function getBuildingArea(): int
    {
        return $this->building_area;
    }

    public function getBuildingHabitableArea(): int
    {
        return $this->building_habitable_area;
    }

    public function getBuildingCorporateArea(): int
    {
        return $this->building_corporate_area;
    }

    public function getBuildingBuiltArea(): int
    {
        return $this->building_built_area;
    }

    public function getBuildingGarageArea(): int
    {
        return $this->building_garage_area;
    }

    public function getBuildingCarportArea(): int
    {
        return $this->building_carport_area;
    }

    public function getBuildingOuthouseArea(): int
    {
        return $this->building_outhouse_area;
    }

    public function getBuildingConservatoryArea(): int
    {
        return $this->building_conservatory_area;
    }

    public function getBuildingFloorCount(): int
    {
        return $this->building_floor_count;
    }

    public function getBuildingPreservationCode(): string|null
    {
        return $this->building_preservation_code;
    }

    public function getBuildingPreservationStatus(): string|null
    {
        return $this->building_preservation_status;
    }

    public function getBuildingTenancy(): string|null
    {
        return $this->building_tenancy;
    }

    public function getBuildingRent(): int
    {
        return $this->building_rent;
    }

    public function getBuildingPointID(): string
    {
        return $this->building_point_id;
    }
}
