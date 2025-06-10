<?php
namespace LuzernTourismus\MarketingProgramm\Data\ChangeLog;
use Nemundo\Model\Data\AbstractModelUpdate;
class ChangeLogUpdate extends AbstractModelUpdate {
/**
* @var ChangeLogModel
*/
public $model;

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
public function update() {
$this->typeValueList->setModelValue($this->model->userId, $this->userId);
if ($this->dateTime->hasValue()) {
$property = new \Nemundo\Model\Data\Property\DateTime\DateTimeDataProperty($this->model->dateTime, $this->typeValueList);
$property->setValue($this->dateTime);
}
$this->typeValueList->setModelValue($this->model->changeLogTypeId, $this->changeLogTypeId);
$this->typeValueList->setModelValue($this->model->dataId, $this->dataId);
$this->typeValueList->setModelValue($this->model->operationId, $this->operationId);
parent::update();
}
}