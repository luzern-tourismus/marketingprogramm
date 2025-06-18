<?php

namespace LuzernTourismus\MarketingProgramm\Parameter;

use Nemundo\Web\Parameter\AbstractUrlParameter;

class StatusParameter extends AbstractUrlParameter
{
    protected function loadParameter()
    {
        $this->parameterName = 'status';
    }
}