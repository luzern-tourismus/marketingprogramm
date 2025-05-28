<?php

namespace LuzernTourismus\MarketingProgramm\Parameter;

use Nemundo\Web\Parameter\AbstractUrlParameter;

class PartnerParameter extends AbstractUrlParameter
{
    protected function loadParameter()
    {
        $this->parameterName = 'partner';
    }
}