<?php

namespace LuzernTourismus\MarketingProgramm\Business\Kontakt;

use LuzernTourismus\MarketingProgramm\Business\Base\AbstractBusinessType;
use Nemundo\Core\Type\AbstractType;

class KontaktType extends AbstractBusinessType
{

    protected function loadType()
    {

        $this->businessType='Kontakt';
        $this->logView = KontaktLogView::class;

    }

}