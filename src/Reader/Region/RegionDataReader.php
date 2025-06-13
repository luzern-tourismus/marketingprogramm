<?php

namespace LuzernTourismus\MarketingProgramm\Reader\Region;

use LuzernTourismus\MarketingProgramm\Data\Region\RegionReader;

class RegionDataReader extends RegionReader
{

    public function __construct()
    {

        parent::__construct();
        $this->addOrder($this->model->region);

    }

}