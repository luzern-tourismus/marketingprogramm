<?php

namespace LuzernTourismus\MarketingProgramm\Reader\Partner;

use LuzernTourismus\MarketingProgramm\Data\Partner\PartnerModel;

class PartnerDataModel extends PartnerModel
{

    public function __construct()
    {

        parent::__construct();
        $this->loadMitarbeiter();

    }

}