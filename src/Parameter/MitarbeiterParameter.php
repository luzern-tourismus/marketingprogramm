<?php

namespace LuzernTourismus\MarketingProgramm\Parameter;

use Nemundo\Web\Parameter\AbstractUrlParameter;

class MitarbeiterParameter extends AbstractUrlParameter
{
    protected function loadParameter()
    {
        $this->parameterName = 'mitarbeiter';
    }
}