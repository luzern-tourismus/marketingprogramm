<?php

namespace LuzernTourismus\MarketingProgramm\Reader\Partner;

use LuzernTourismus\MarketingProgramm\Data\Partner\PartnerRow;

class PartnerDataRow extends PartnerRow
{

    public function getPlzOrt()
    {

        $plzOrt = $this->plz . ' ' . $this->ort;
        return $plzOrt;

    }

}