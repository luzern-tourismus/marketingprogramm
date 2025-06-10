<?php
namespace LuzernTourismus\MarketingProgramm\Parameter;
use Nemundo\Web\Parameter\AbstractUrlParameter;
class OptionParameter extends AbstractUrlParameter {
protected function loadParameter() {
$this->parameterName = 'aktivaetoption';
}
}