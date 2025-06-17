<?php

namespace LuzernTourismus\MarketingProgramm\Reader\Option;

use LuzernTourismus\MarketingProgramm\Data\Option\OptionRow;
use LuzernTourismus\MarketingProgramm\Price\PriceNumber;
use Nemundo\Core\Type\Number\Number;

// LuzernTourismus\MarketingProgramm\Reader\Option\OptionDataRow


class OptionDataRow extends OptionRow
{

    public function getPreis()
    {

        $preis = $this->preis;

        if ($this->hasPreis) {
            $preis = (new PriceNumber())->getPrice($preis);
        } else {
            $preis = 'tbd';
        }

        return $preis;

    }

}