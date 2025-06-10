<?php
namespace LuzernTourismus\MarketingProgramm\Data\ChangeLogType;
use Nemundo\Model\Data\AbstractModelUpdate;
class ChangeLogTypeUpdate extends AbstractModelUpdate {
/**
* @var ChangeLogTypeModel
*/
public $model;

/**
* @var string
*/
public $changeLogType;

/**
* @var string
*/
public $phpClass;

public function __construct() {
parent::__construct();
$this->model = new ChangeLogTypeModel();
}
public function update() {
$this->typeValueList->setModelValue($this->model->changeLogType, $this->changeLogType);
$this->typeValueList->setModelValue($this->model->phpClass, $this->phpClass);
parent::update();
}
}