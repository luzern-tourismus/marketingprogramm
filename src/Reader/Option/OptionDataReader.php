<?php

namespace LuzernTourismus\MarketingProgramm\Reader\Option;

use LuzernTourismus\MarketingProgramm\Data\Option\OptionReader;

class OptionDataReader extends OptionReader
{

    public function __construct()
    {

        parent::__construct();
        $this->addOrder($this->model->itemOrder);

    }

}