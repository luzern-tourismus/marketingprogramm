<?php

namespace LuzernTourismus\MarketingProgramm\Business\Partner;

use LuzernTourismus\MarketingProgramm\Business\Base\AbstractBuilder;
use LuzernTourismus\MarketingProgramm\Data\Partner\Partner;
use LuzernTourismus\MarketingProgramm\Data\Partner\PartnerUpdate;

class PartnerBuilder extends AbstractBuilder
{

    public $firma;

    public $strasse;

    public $plz;

    public $ort;


    protected function loadBuilder()
    {
        $this->type = new PartnerType();
    }


    protected function onCreate()
    {

        $data = new Partner();
        $data->isDeleted = false;
        $data->firma = $this->firma;
        $data->strasse = $this->strasse;
        $data->plz = $this->plz;
        $data->ort = $this->ort;
        $data->anmeldungFinalisiert=false;
        $this->id = $data->save();

    }


    protected function onUpdate()
    {

        $update = new PartnerUpdate();
        $update->firma = $this->firma;
        $update->strasse = $this->strasse;
        $update->plz = $this->plz;
        $update->ort = $this->ort;
        $update->updateById($this->id);

    }

}