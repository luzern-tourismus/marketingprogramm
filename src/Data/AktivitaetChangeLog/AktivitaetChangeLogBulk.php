<?php
namespace LuzernTourismus\MarketingProgramm\Data\AktivitaetChangeLog;
class AktivitaetChangeLogBulk extends \Nemundo\Model\Data\AbstractModelDataBulk {
/**
* @var AktivitaetChangeLogModel
*/
protected $model;

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
public function save() {
$this->typeValueList->setModelValue($this->model->aktivitaetId, $this->aktivitaetId);
$this->typeValueList->setModelValue($this->model->userId, $this->userId);
if ($this->dateTime->hasValue()) {
$property = new \Nemundo\Model\Data\Property\DateTime\DateTimeDataProperty($this->model->dateTime, $this->typeValueList);
$property->setValue($this->dateTime);
}
$this->typeValueList->setModelValue($this->model->aktivitaetHasChanged, $this->aktivitaetHasChanged);
$this->typeValueList->setModelValue($this->model->aktivitaetOld, $this->aktivitaetOld);
$this->typeValueList->setModelValue($this->model->aktivitaetNew, $this->aktivitaetNew);
$id = parent::save();
return $id;
}
}