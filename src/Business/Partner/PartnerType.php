<?php

namespace LuzernTourismus\MarketingProgramm\Business\Partner;

use LuzernTourismus\MarketingProgramm\Business\Base\AbstractBusinessType;
use Nemundo\Core\Type\AbstractType;

class PartnerType extends AbstractBusinessType
{

    protected function loadType()
    {

        $this->businessType= 'partner';
        $this->logView= PartnerLogView::class;

    }

}