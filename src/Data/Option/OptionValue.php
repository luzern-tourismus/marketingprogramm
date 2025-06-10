<?php
namespace LuzernTourismus\MarketingProgramm\Data\Option;
class OptionValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var OptionModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new OptionModel();
}
}