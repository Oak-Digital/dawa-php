<?php

namespace Oakdigital\DawaPhp\Entities\Address;

class AccessAddress extends Address
{
    private AddressAttribute $vejstykke;
    private string $houseNumber;

    private AddressAttribute $postalCode;
    private AddressAttribute $ejerlav;

    private string $esrPropertyNumber;
    private string $plotNumber;

    private AddressAttribute $sogn;
    private AddressAttribute $region;
    private AddressAttribute $landsdel;
    private AddressAttribute $retskreds;
    private AddressAttribute $politikreds;
    private AddressAttribute $opstillingskreds;
    private AddressAttribute $afstemningsområde;
    private AddressAttribute $storkreds;
    private AddressAttribute $valglandsdel;

    private string $zone;

    public static function fromData($data): AccessAddress
    {
        $accAddr = new AccessAddress();

        $accAddr->entity_id = $data->id;
        $accAddr->status = $data->status;
        $accAddr->darStatus = $data->darstatus;
        $accAddr->addressString = $data->adressebetegnelse;

        $accAddr->houseNumber = $data->husnr;

        $accAddr->esrPropertyNumber = $data->esrejendomsnr;
        $accAddr->plotNumber = $data->matrikelnr;

        $accAddr->sogn             = new AddressAttribute($data->sogn->navn, $data->sogn->href);
        $accAddr->region           = new AddressAttribute($data->region->navn, $data->region->href);
        $accAddr->landsdel         = new AddressAttribute($data->landsdel->navn, $data->landsdel->href);
        $accAddr->retskreds        = new AddressAttribute($data->retskreds->navn, $data->retskreds->href);
        $accAddr->politikreds      = new AddressAttribute($data->politikreds->navn, $data->politikreds->href);
        $accAddr->opstillingskreds = new AddressAttribute($data->opstillingskreds->navn, $data->opstillingskreds->href);
        $accAddr->storkreds        = new AddressAttribute($data->storkreds->navn, $data->storkreds->href);
        $accAddr->valglandsdel     = isset($data->valglandsdel) ? new AddressAttribute($data->valglandsdel->navn, $data->valglandsdel->href) : null;

        $accAddr->accessAddress = $accAddr;
        return $accAddr;
    }


    public function getHouseNumber(): string
    {
        return $this->houseNumber;
    }
}
