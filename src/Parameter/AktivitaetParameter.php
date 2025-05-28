<?php

namespace LuzernTourismus\MarketingProgramm\Parameter;

use Nemundo\Web\Parameter\AbstractUrlParameter;

class AktivitaetParameter extends AbstractUrlParameter
{
    protected function loadParameter()
    {
        $this->parameterName = 'aktivitaet';
    }
}