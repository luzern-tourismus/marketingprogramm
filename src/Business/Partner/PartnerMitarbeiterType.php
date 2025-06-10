<?php

namespace LuzernTourismus\MarketingProgramm\Business\Partner;

use LuzernTourismus\MarketingProgramm\Business\Base\AbstractBusinessType;

class PartnerMitarbeiterType extends AbstractBusinessType
{

    protected function loadType()
    {

        $this->businessType= 'partner_mitarbeiter';
        $this->logView= PartnerMitarbeiterLogView::class;

    }

}