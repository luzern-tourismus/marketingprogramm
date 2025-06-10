<?php

namespace LuzernTourismus\MarketingProgramm\Reader\Option;

use LuzernTourismus\MarketingProgramm\Data\Option\OptionRow;
use Nemundo\Core\Type\Number\Number;

// LuzernTourismus\MarketingProgramm\Reader\Option\OptionDataRow


class OptionDataRow extends OptionRow
{

    public function getPreis()
    {

        $preis = $this->preis;

        if ($this->hasPreis) {
            $preis  =  ((new Number($this->preis))->getFormatNumber() . ' CHF');
        } else {
            $preis = 'tbd';
        }

        return $preis;

    }

}