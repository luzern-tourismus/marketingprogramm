<?php
namespace LuzernTourismus\MarketingProgramm\Data\Option;
class OptionCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var OptionModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new OptionModel();
}
}