<?php
namespace LuzernTourismus\MarketingProgramm\Data\ChangeLogOperation;
class ChangeLogOperationBulk extends \Nemundo\Model\Data\AbstractModelDataBulk {
/**
* @var ChangeLogOperationModel
*/
protected $model;

/**
* @var int
*/
public $id;

/**
* @var string
*/
public $operation;

public function __construct() {
parent::__construct();
$this->model = new ChangeLogOperationModel();
}
public function save() {
$id = $this->id;
$this->typeValueList->setModelValue($this->model->id, $id);
$this->typeValueList->setModelValue($this->model->operation, $this->operation);
$id = parent::save();
return $id;
}
}