<?php
namespace LuzernTourismus\MarketingProgramm\Data\ChangeLog;
class ChangeLogBulk extends \Nemundo\Model\Data\AbstractModelDataBulk {
/**
* @var ChangeLogModel
*/
protected $model;

/**
* @var string
*/
public $userId;

/**
* @var \Nemundo\Core\Type\DateTime\DateTime
*/
public $dateTime;

/**
* @var string
*/
public $changeLogTypeId;

/**
* @var int
*/
public $dataId;

/**
* @var string
*/
public $operationId;

public function __construct() {
parent::__construct();
$this->model = new ChangeLogModel();
$this->dateTime = new \Nemundo\Core\Type\DateTime\DateTime();
}
public function save() {
$this->typeValueList->setModelValue($this->model->userId, $this->userId);
if ($this->dateTime->hasValue()) {
$property = new \Nemundo\Model\Data\Property\DateTime\DateTimeDataProperty($this->model->dateTime, $this->typeValueList);
$property->setValue($this->dateTime);
}
$this->typeValueList->setModelValue($this->model->changeLogTypeId, $this->changeLogTypeId);
$this->typeValueList->setModelValue($this->model->dataId, $this->dataId);
$this->typeValueList->setModelValue($this->model->operationId, $this->operationId);
$id = parent::save();
return $id;
}
}