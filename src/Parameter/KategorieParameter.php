<?php

namespace LuzernTourismus\MarketingProgramm\Parameter;

use Nemundo\Web\Parameter\AbstractUrlParameter;

class KategorieParameter extends AbstractUrlParameter
{
    protected function loadParameter()
    {
        $this->parameterName = 'kategorie';
    }
}