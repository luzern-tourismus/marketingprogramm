<?php
namespace LuzernTourismus\MarketingProgramm\Data\Option;
class OptionDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var OptionModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new OptionModel();
}
}