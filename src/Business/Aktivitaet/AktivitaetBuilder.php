<?php

namespace LuzernTourismus\MarketingProgramm\Business\Aktivitaet;

use LuzernTourismus\MarketingProgramm\Business\Base\AbstractBuilder;
use LuzernTourismus\MarketingProgramm\Data\Aktivitaet\Aktivitaet;
use LuzernTourismus\MarketingProgramm\Data\Aktivitaet\AktivitaetUpdate;
use Nemundo\Core\Check\ValueCheck;

class AktivitaetBuilder extends AbstractBuilder
{

    public $kategorieId;

    public $aktivaet;

    public $datum;

    public $kosten;

    public $leistung;

    public $zielpublikum;

    public $kontaktId;



    protected function onCreate()
    {

        $data = new Aktivitaet();
        $data->isDeleted = false;
        //$data->kategorieId = $this->kategorieId;
        $data->aktivitaet = $this->aktivaet;
        $data->datum = $this->datum;
        $data->kosten = $this->kosten;
        $data->leistung = $this->leistung;
        $data->zielpublikum = $this->zielpublikum;

        if ((new ValueCheck())->hasValue($this->kategorieId)) {
            $data->kategorieId = $this->kategorieId;
        }

        if ((new ValueCheck())->hasValue($this->kontaktId)) {
            $data->kontaktId = $this->kontaktId;
        }

        $data->save();

    }


    protected function onUpdate()
    {

        $update = new AktivitaetUpdate();
        //$update->isDeleted = false;
        //$update->kategorieId = $this->kategorieId;
        $update->aktivitaet = $this->aktivaet;
        $update->datum = $this->datum;
        $update->kosten = $this->kosten;
        $update->leistung = $this->leistung;
        $update->zielpublikum = $this->zielpublikum;
        //$update->kontaktId = $this->kontaktId;

        if ((new ValueCheck())->hasValue($this->kategorieId)) {
            $update->kategorieId = $this->kategorieId;
        }

        if ((new ValueCheck())->hasValue($this->kontaktId)) {
            $update->kontaktId = $this->kontaktId;
        }

        $update->updateById($this->id);


    }


}