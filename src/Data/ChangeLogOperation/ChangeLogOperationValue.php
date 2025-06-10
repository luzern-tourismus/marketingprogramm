<?php
namespace LuzernTourismus\MarketingProgramm\Data\ChangeLogOperation;
class ChangeLogOperationValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var ChangeLogOperationModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ChangeLogOperationModel();
}
}