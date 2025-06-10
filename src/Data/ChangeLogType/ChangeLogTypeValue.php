<?php
namespace LuzernTourismus\MarketingProgramm\Data\ChangeLogType;
class ChangeLogTypeValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var ChangeLogTypeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ChangeLogTypeModel();
}
}