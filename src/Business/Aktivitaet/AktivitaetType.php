<?php

namespace LuzernTourismus\MarketingProgramm\Business\Aktivitaet;

use LuzernTourismus\MarketingProgramm\Business\Base\AbstractBusinessType;

class AktivitaetType extends AbstractBusinessType
{

    protected function loadType()
    {
        $this->businessType='Aktivität';
        $this->logView= AktivitaetLogView::class;
    }

}