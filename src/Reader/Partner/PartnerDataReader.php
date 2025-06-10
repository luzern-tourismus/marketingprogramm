<?php

namespace LuzernTourismus\MarketingProgramm\Reader\Partner;

use LuzernTourismus\MarketingProgramm\Data\Partner\PartnerReader;

class PartnerDataReader extends PartnerReader
{

    public function orderByFirma()
    {

        $this->addOrder($this->model->firma);
        return $this;

    }

}