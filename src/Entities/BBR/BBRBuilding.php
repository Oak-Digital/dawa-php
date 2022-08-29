<?php

namespace Oakdigital\DawaPhp\Entities\BBR;

class BBRBuilding extends BBREntity
{
    private $byggesag_id;
    private int $byg_anvend_kode;

    private int $opfoerelse_aar             = 0;
    private int $ombyg_aar            = 0;

    private int $byg_arl_samlet              = 0;
    private int $byg_bolig_arl_samlet    = 0;
    private int $erhv_arl_saml    = 0;
    private int $byg_bebyg_arl        = 0;
    private int $garage_indb_arl       = 0;
    private int $carport_indb_arl      = 0;
    private int $udhus_indb_arl     = 0;
    private int $udestue_arl = 0;

    private int $etager_ant       = 0;

    private $fredning_kode;
    private $bevar_vaerdig;

    private $udlej_forhold;
    private int $husleje = 0;

    private string $bygpkt_id;

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
                    $this->byggesag_id = $data_line;
                    unset($data[$data_key]);
                    break;
                case 'BYG_ANVEND_KODE':
                    $this->byg_anvend_kode = intval($data_line);
                    unset($data[$data_key]);
                    break;
                case 'OPFOERELSE_AAR':
                    $this->opfoerelse_aar = intval($data_line);
                    unset($data[$data_key]);
                    break;
                case 'OMBYG_AAR':
                    $this->ombyg_aar = intval($data_line);
                    unset($data[$data_key]);
                    break;
                case 'BYG_ARL_SAML':
                    $this->byg_arl_samlet = intval($data_line);
                    unset($data[$data_key]);
                    break;
                case 'BYG_BOLIG_ARL_SAML':
                    $this->byg_bolig_arl_samlet = intval($data_line);
                    unset($data[$data_key]);
                    break;
                case 'ERHV_ARL_SAML':
                    $this->erhv_arl_saml = intval($data_line);
                    unset($data[$data_key]);
                    break;
                case 'BYG_BEBYG_ARL':
                    $this->byg_bebyg_arl = intval($data_line);
                    unset($data[$data_key]);
                    break;
                case 'GARAGE_INDB_ARL':
                    $this->garage_indb_arl = intval($data_line);
                    unset($data[$data_key]);
                    break;
                case 'CARPORT_INDB_ARL':
                    $this->carport_indb_arl = intval($data_line);
                    unset($data[$data_key]);
                    break;
                case 'UDHUS_INDB_ARL':
                    $this->udhus_indb_arl = intval($data_line);
                    unset($data[$data_key]);
                    break;
                case 'UDESTUE_ARL':
                    $this->udestue_arl = intval($data_line);
                    unset($data[$data_key]);
                    break;
                case 'ETAGER_ANT':
                    $this->etager_ant = intval($data_line);
                    unset($data[$data_key]);
                    break;
                case 'FREDNING_KODE':
                    $this->fredning_kode = $data_line;
                    unset($data[$data_key]);
                    break;
                case 'BevarVaerdig':
                    $this->bevar_vaerdig = $data_line;
                    unset($data[$data_key]);
                    break;
                case 'UdlejForhold1':
                    $this->udlej_forhold = $data_line;
                    unset($data[$data_key]);
                    break;
                case 'HusLeje':
                    $this->husleje = intval($data_line);
                    unset($data[$data_key]);
                    break;
                case 'bygningspunkt':
                    if (isset($data_line['BygPkt_id'])) $this->bygpkt_id = $data_line['BygPkt_id'];
                    unset($data[$data_key]);
                    break;
            }
        }

        return parent::set($data);
    }

    public function getCaseNumber()
    {
        return $this->byggesag_id;
    }

    public function getBuildingUseCode()
    {
        return $this->byg_anvend_kode;
    }

    public function getBuildYear()
    {
        return $this->opfoerelse_aar;
    }

    public function getRenovationYear()
    {
        return $this->ombyg_aar;
    }

    public function getBuildingArea()
    {
        return $this->byg_arl_samlet;
    }

    public function getBuildingHabitableArea()
    {
        return $this->byg_bolig_arl_samlet;
    }

    public function getBuildingCorporateArea()
    {
        return $this->erhv_arl_saml;
    }

    public function getBuildingBuiltArea()
    {
        return $this->byg_bebyg_arl;
    }

    public function getBuildingGarageArea()
    {
        return $this->garage_indb_arl;
    }

    public function getBuildingCarportArea()
    {
        return $this->carport_indb_arl;
    }

    public function getBuildingOuthouseArea()
    {
        return $this->udhus_indb_arl;
    }

    public function getBuildingConservatoryArea()
    {
        return $this->udestue_arl;
    }

    public function getBuildingFloorCount()
    {
        return $this->etager_ant;
    }

    public function getBuildingPreservationCode()
    {
        return $this->fredning_kode;
    }

    public function getBuildingPreservationStatus()
    {
        return $this->bevar_vaerdig;
    }

    public function getBuildingTenancy()
    {
        return $this->udlej_forhold;
    }

    public function getBuildingRent()
    {
        return $this->husleje;
    }

    public function getBuildingPointID()
    {
        return $this->bygpkt_id;
    }

    protected function getAssocData()
    {
        return parent::getAssocData() + [
            'byggesag_id' => $this->byggesag_id,
            'byg_anvend_kode' => $this->byg_anvend_kode,
            'opfoerelse_aar' => $this->opfoerelse_aar,
            'ombyg_aar' => $this->ombyg_aar,
            'byg_arl_samlet' => $this->byg_arl_samlet,
            'byg_bolig_arl_samlet' => $this->byg_bolig_arl_samlet,
            'erhv_arl_saml' => $this->erhv_arl_saml,
            'byg_bebyg_arl' => $this->byg_bebyg_arl,
            'garage_indb_arl' => $this->garage_indb_arl,
            'carport_indb_arl' => $this->carport_indb_arl,
            'udhus_indb_arl' => $this->udhus_indb_arl,
            'udestue_arl' => $this->udestue_arl,
            'etager_ant' => $this->etager_ant,
            'fredning_kode' => $this->fredning_kode,
            'bevar_vaerdig' => $this->bevar_vaerdig,
            'udlej_forhold' => $this->udlej_forhold,
            'husleje' => $this->husleje,
            'bygpkt_id' => $this->bygpkt_id
        ];
    }
}
