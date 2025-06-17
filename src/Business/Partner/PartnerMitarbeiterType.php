<?php

namespace LuzernTourismus\MarketingProgramm\Business\Partner;

use LuzernTourismus\MarketingProgramm\Business\Base\AbstractBusinessType;

class PartnerMitarbeiterType extends AbstractBusinessType
{

    protected function loadType()
    {

        $this->businessType= 'Partner Mitarbeiter';
        $this->logView= PartnerMitarbeiterLogView::class;

    }

}