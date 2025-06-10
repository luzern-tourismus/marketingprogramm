<?php
namespace LuzernTourismus\MarketingProgramm\Data\ChangeLogType;
class ChangeLogTypeBulk extends \Nemundo\Model\Data\AbstractModelDataBulk {
/**
* @var ChangeLogTypeModel
*/
protected $model;

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
public function save() {
$this->typeValueList->setModelValue($this->model->changeLogType, $this->changeLogType);
$this->typeValueList->setModelValue($this->model->phpClass, $this->phpClass);
$id = parent::save();
return $id;
}
}