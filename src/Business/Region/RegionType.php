<?php

namespace LuzernTourismus\MarketingProgramm\Business\Region;

use LuzernTourismus\MarketingProgramm\Business\Base\AbstractBusinessType;
use Nemundo\Core\Type\AbstractType;

class RegionType extends AbstractBusinessType
{

    protected function loadType() {

        $this->businessType= 'Region';
        $this->logView= RegionLogView::class;

    }

}