<?php

namespace LuzernTourismus\MarketingProgramm\Business\Partner;

use LuzernTourismus\MarketingProgramm\Business\Base\AbstractBuilder;
use LuzernTourismus\MarketingProgramm\Data\Partner\Partner;
use LuzernTourismus\MarketingProgramm\Data\Partner\PartnerUpdate;
use Nemundo\Core\Check\ValueCheck;

class PartnerBuilder extends AbstractBuilder
{

    public $firma;

    public $strasse;

    public $plz;

    public $ort;

    public $mitarbeiterId;


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
        $data->anmeldungFinalisiert = false;
        $data->mitarbeiterId = $this->mitarbeiterId;
        $this->id = $data->save();

    }


    protected function onUpdate()
    {

        $update = new PartnerUpdate();
        $update->firma = $this->firma;
        $update->strasse = $this->strasse;
        $update->plz = $this->plz;
        $update->ort = $this->ort;

        if ((new ValueCheck())->hasValue($this->mitarbeiterId)) {
            $update->mitarbeiterId = $this->mitarbeiterId;
        }
        $update->updateById($this->id);

    }

}