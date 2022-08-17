<?php

namespace Oakdigital\DawaPhp\Entities\Address;

class AccessAddress extends Address
{
    private string $husnr;
    private string $esrejendomsnr;
    private string $matrikelnr;
    private string $zone;

    private AddressAttribute $vejstykke;
    private AddressAttribute $postnummer;
    private AddressAttribute $ejerlav;
    private AddressAttribute $kommune;
    private AddressAttribute $sogn;
    private AddressAttribute $region;
    private AddressAttribute $landsdel;
    private AddressAttribute $retskreds;
    private AddressAttribute $politikreds;
    private AddressAttribute $opstillingskreds;
    private AddressAttribute $afstemningsområde;
    private AddressAttribute $storkreds;
    private AddressAttribute $valglandsdel;


    public function __construct($json = false)
    {
        $this->accessAddress = $this;
        parent::__construct($json);
    }

    /**
     *
     * @param array $data
     * @return AccessAddress
     */
    public function set(array $data)
    {
        foreach ($data as $data_key => $data_line) {

            switch ($data_key) {
                case 'husnr':
                case 'esrejendomsnr':
                case 'matrikelnr':
                case 'zone':
                    if (property_exists($this, $data_key)) {
                        $this->{$data_key} = $data_line;
                        unset($data[$data_key]);
                    }
                    break;

                case 'vejstykke':
                case 'region':
                case 'postnummer':
                case 'kommune':
                case 'sogn':
                case 'region':
                case 'landsdel':
                case 'retskreds':
                case 'politikreds':
                case 'opstillingskreds':
                case 'afstemningsområde':
                case 'storkreds':
                case 'valglandsdel':
                    if (property_exists($this, $data_key)) {
                        $this->{$data_key} = new AddressAttribute();
                        $this->{$data_key}->set($data_line);
                        unset($data[$data_key]);
                    }
                    break;

                case 'ejerlav':
                    $this->ejerlav = new AddressAttribute();
                    $this->ejerlav->set($data_line);
                    $this->ejerlav->setCode($data_line['kode']);
                    unset($data[$data_key]);
                    break;
            }
        }

        return parent::set($data);
    }

    public function getHusnr(): string
    {
        return $this->husnr;
    }

    public function getESREjendomsnr(): string
    {
        return $this->esrejendomsnr;
    }

    public function getMatrikelnr(): string
    {
        return $this->matrikelnr;
    }

    public function getZone(): string
    {
        return $this->zone;
    }

    public function getVejstykke()
    {
        return $this->vejstykke;
    }

    public function getPostnummer()
    {
        return $this->postnummer;
    }

    public function getEjerlav()
    {
        return $this->ejerlav;
    }

    public function getKommune()
    {
        return $this->kommune;
    }

    public function getSogn()
    {
        return $this->sogn;
    }

    public function getRegion()
    {
        return $this->region;
    }

    public function getLandsdel()
    {
        return $this->landsdel;
    }

    public function getRetskreds()
    {
        return $this->retskreds;
    }

    public function getPolitikreds()
    {
        return $this->politikreds;
    }

    public function getOpstillingskreds()
    {
        return $this->opstillingskreds;
    }

    public function getAfstemningsområde()
    {
        return $this->afstemningsområde;
    }

    public function getStorkreds()
    {
        return $this->storkreds;
    }

    public function getValglandsdel()
    {
        return $this->valglandsdel;
    }
}
