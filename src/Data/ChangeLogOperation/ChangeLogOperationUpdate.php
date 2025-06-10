<?php
namespace LuzernTourismus\MarketingProgramm\Data\ChangeLogOperation;
use Nemundo\Model\Data\AbstractModelUpdate;
class ChangeLogOperationUpdate extends AbstractModelUpdate {
/**
* @var ChangeLogOperationModel
*/
public $model;

/**
* @var string
*/
public $operation;

public function __construct() {
parent::__construct();
$this->model = new ChangeLogOperationModel();
}
public function update() {
$this->typeValueList->setModelValue($this->model->operation, $this->operation);
parent::update();
}
}