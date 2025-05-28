<?php

namespace LuzernTourismus\MarketingProgramm\Parameter;

use Nemundo\Web\Parameter\AbstractUrlParameter;

class KontaktParameter extends AbstractUrlParameter
{
    protected function loadParameter()
    {
        $this->parameterName = 'kontakt';
    }
}