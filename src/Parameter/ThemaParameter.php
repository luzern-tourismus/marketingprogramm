<?php

namespace LuzernTourismus\MarketingProgramm\Parameter;

use Nemundo\Web\Parameter\AbstractUrlParameter;

class ThemaParameter extends AbstractUrlParameter
{
    protected function loadParameter()
    {
        $this->parameterName = 'thema';
    }
}