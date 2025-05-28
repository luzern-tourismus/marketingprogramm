<?php

namespace LuzernTourismus\MarketingProgramm\Business\Partner;

use LuzernTourismus\MarketingProgramm\Business\Base\AbstractBuilder;
use LuzernTourismus\MarketingProgramm\Data\Partner\Partner;
use LuzernTourismus\MarketingProgramm\Data\Partner\PartnerUpdate;

class PartnerBuilder extends AbstractBuilder
{

    public $firma;

    protected function onCreate()
    {

        $data = new Partner();
        $data->isDeleted = false;
        $data->firma = $this->firma;
        $data->save();

    }


    protected function onUpdate()
    {

        $data = new PartnerUpdate();
        $data->firma = $this->firma;
        $data->updateById($this->id);

    }

}