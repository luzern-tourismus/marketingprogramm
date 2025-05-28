<?php
namespace LuzernTourismus\MarketingProgramm\Data\AktivitaetChangeLog;
use Nemundo\Model\Data\AbstractModelUpdate;
class AktivitaetChangeLogUpdate extends AbstractModelUpdate {
/**
* @var AktivitaetChangeLogModel
*/
public $model;

/**
* @var string
*/
public $aktivitaetId;

/**
* @var string
*/
public $userId;

/**
* @var \Nemundo\Core\Type\DateTime\DateTime
*/
public $dateTime;

/**
* @var bool
*/
public $aktivitaetHasChanged;

/**
* @var string
*/
public $aktivitaetOld;

/**
* @var string
*/
public $aktivitaetNew;

public function __construct() {
parent::__construct();
$this->model = new AktivitaetChangeLogModel();
$this->dateTime = new \Nemundo\Core\Type\DateTime\DateTime();
}
public function update() {
$this->typeValueList->setModelValue($this->model->aktivitaetId, $this->aktivitaetId);
$this->typeValueList->setModelValue($this->model->userId, $this->userId);
if ($this->dateTime->hasValue()) {
$property = new \Nemundo\Model\Data\Property\DateTime\DateTimeDataProperty($this->model->dateTime, $this->typeValueList);
$property->setValue($this->dateTime);
}
$this->typeValueList->setModelValue($this->model->aktivitaetHasChanged, $this->aktivitaetHasChanged);
$this->typeValueList->setModelValue($this->model->aktivitaetOld, $this->aktivitaetOld);
$this->typeValueList->setModelValue($this->model->aktivitaetNew, $this->aktivitaetNew);
parent::update();
}
}