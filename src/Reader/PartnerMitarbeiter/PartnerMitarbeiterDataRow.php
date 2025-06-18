<?php

namespace LuzernTourismus\MarketingProgramm\Reader\PartnerMitarbeiter;

// LuzernTourismus\MarketingProgramm\Reader\PartnerMitarbeiter\PartnerMitarbeiterDataRow

use LuzernTourismus\MarketingProgramm\Data\PartnerMitarbeiter\PartnerMitarbeiterRow;

class PartnerMitarbeiterDataRow extends PartnerMitarbeiterRow
{

    public function getVornameName()
    {

        $vornameName = $this->vorname.' '.$this->name;
        return $vornameName;


    }

}