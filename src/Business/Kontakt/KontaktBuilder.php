<?php

namespace LuzernTourismus\MarketingProgramm\Business\Kontakt;

use LuzernTourismus\MarketingProgramm\Business\Base\AbstractBuilder;
use LuzernTourismus\MarketingProgramm\Data\Kontakt\Kontakt;
use LuzernTourismus\MarketingProgramm\Data\Kontakt\KontaktUpdate;

class KontaktBuilder extends AbstractBuilder
{

    public $name;

    public $vorname;

    public $email;

    public $telefon;


    protected function onCreate()
    {

        $data = new Kontakt();
        $data->isDeleted = false;
        $data->name = $this->name;
        $data->vorname = $this->vorname;
        $data->email = $this->email;
        $data->telefon = $this->telefon;
        $data->save();

    }


    protected function onUpdate()
    {

        $update = new KontaktUpdate();
        $update->isDeleted = false;
        $update->name = $this->name;
        $update->vorname = $this->vorname;
        $update->email = $this->email;
        $update->telefon = $this->telefon;
        $update->updateById($this->id);

    }

}