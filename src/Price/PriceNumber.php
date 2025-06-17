<?php

namespace LuzernTourismus\MarketingProgramm\Price;

use Nemundo\Core\Base\AbstractBase;
use Nemundo\Core\Check\ValueCheck;
use Nemundo\Core\Type\Number\Number;

class PriceNumber extends AbstractBase
{

    public function getPrice($number)
    {

        $price = null;
        if ((new ValueCheck())->hasValue($number)) {
            $price = (new Number($number))->getFormatNumber() . ' CHF';
        } else {
            $price = 'tbd';
        }

        return $price;

    }

}