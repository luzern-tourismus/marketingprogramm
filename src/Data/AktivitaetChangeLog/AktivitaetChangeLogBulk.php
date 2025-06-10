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

/**
* @var bool
*/
public $datumHasChanged;

/**
* @var string
*/
public $datumOld;

/**
* @var string
*/
public $datumNew;

/**
* @var string
*/
public $logId;

public function __construct() {
parent::__construct();
$this->model = new AktivitaetChangeLogModel();
}
public function save() {
$this->typeValueList->setModelValue($this->model->aktivitaetId, $this->aktivitaetId);
$this->typeValueList->setModelValue($this->model->aktivitaetHasChanged, $this->aktivitaetHasChanged);
$this->typeValueList->setModelValue($this->model->aktivitaetOld, $this->aktivitaetOld);
$this->typeValueList->setModelValue($this->model->aktivitaetNew, $this->aktivitaetNew);
$this->typeValueList->setModelValue($this->model->datumHasChanged, $this->datumHasChanged);
$this->typeValueList->setModelValue($this->model->datumOld, $this->datumOld);
$this->typeValueList->setModelValue($this->model->datumNew, $this->datumNew);
$this->typeValueList->setModelValue($this->model->logId, $this->logId);
$id = parent::save();
return $id;
}
}