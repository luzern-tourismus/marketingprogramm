<?php

namespace LuzernTourismus\MarketingProgramm\Business\Kategorie;

use LuzernTourismus\MarketingProgramm\Data\Kategorie\KategorieReader;

class KategorieBusinessReader extends KategorieReader
{

    public function getData()
    {

        $this->addOrder($this->model->kategorie);
        return parent::getData();

    }


}