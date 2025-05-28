<?php

namespace LuzernTourismus\MarketingProgramm\Business\Kategorie;

use LuzernTourismus\MarketingProgramm\Business\Base\AbstractBuilder;
use LuzernTourismus\MarketingProgramm\Data\Kategorie\Kategorie;
use LuzernTourismus\MarketingProgramm\Data\Kategorie\KategorieUpdate;
use Nemundo\Core\Check\ValueCheck;

class KategorieBuilder extends AbstractBuilder
{

    public $kategorie;

    public $themaId;


    protected function onCheck()
    {

        if (!(new ValueCheck())->hasValue($this->kategorie)) {
            throw new \Exception('No Category');
        }

        if (!(new ValueCheck())->hasValue($this->themaId)) {
            throw new \Exception('No Thema Id');
        }

    }


    protected function onCreate()
    {

        $data = new Kategorie();
        $data->isDeleted = false;
        $data->kategorie = $this->kategorie;
        $data->themaId = $this->themaId;
        $data->save();

    }


    protected function onUpdate()
    {

        $update = new KategorieUpdate();
        $update->kategorie = $this->kategorie;
        $update->themaId = $this->themaId;
        $update->updateById($this->id);

    }

}