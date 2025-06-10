<?php
namespace LuzernTourismus\MarketingProgramm\Data\Option;
use Nemundo\Model\Id\AbstractModelIdValue;
class OptionId extends AbstractModelIdValue {
/**
* @var OptionModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new OptionModel();
}
}