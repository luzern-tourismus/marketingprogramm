<?php

namespace LuzernTourismus\MarketingProgramm\Reader\Kategorie;

use LuzernTourismus\MarketingProgramm\Data\Kategorie\KategorieReader;

class KategorieDataReader extends KategorieReader
{

    public function __construct()
    {

        parent::__construct();

        $this->model
            ->loadRegion()
            ->loadThema();

    }

}