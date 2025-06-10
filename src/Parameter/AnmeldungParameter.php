<?php

namespace LuzernTourismus\MarketingProgramm\Parameter;

use Nemundo\Web\Parameter\AbstractUrlParameter;

class AnmeldungParameter extends AbstractUrlParameter
{
    protected function loadParameter()
    {
        $this->parameterName = 'anmeldung';
    }
}