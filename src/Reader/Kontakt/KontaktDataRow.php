<?php

namespace LuzernTourismus\MarketingProgramm\Reader\Kontakt;

use LuzernTourismus\MarketingProgramm\Data\Kontakt\KontaktRow;


// LuzernTourismus\MarketingProgramm\Reader\Kontakt\KontaktDataRow

class KontaktDataRow extends KontaktRow
{

    public function getVornameNachname()
    {

        $value = $this->vorname.' '.$this->nachname;
        return $value;

    }

}