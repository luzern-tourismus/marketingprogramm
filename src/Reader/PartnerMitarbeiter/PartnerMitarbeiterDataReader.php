<?php

namespace LuzernTourismus\MarketingProgramm\Reader\PartnerMitarbeiter;

use LuzernTourismus\MarketingProgramm\Data\PartnerMitarbeiter\PartnerMitarbeiterReader;

class PartnerMitarbeiterDataReader extends PartnerMitarbeiterReader
{

    public function __construct()
    {

        parent::__construct();
        $this->model->loadAnrede();

    }


    public function filterByPartnerId($partnerId)
    {

        $this->filter->andEqual($this->model->partnerId, $partnerId);
        return $this;

    }


}