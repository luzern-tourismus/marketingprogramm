<?php

namespace LuzernTourismus\MarketingProgramm\Business\Kategorie;

use LuzernTourismus\MarketingProgramm\Business\Base\AbstractBusinessType;

class KategorieType extends AbstractBusinessType
{

    protected function loadType()
    {

        $this->businessType = 'Kategorie';
        $this->logView = KategorieLogView::class;

    }

}