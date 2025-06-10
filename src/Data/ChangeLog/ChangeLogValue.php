<?php
namespace LuzernTourismus\MarketingProgramm\Data\ChangeLog;
class ChangeLogValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var ChangeLogModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ChangeLogModel();
}
}