<?php
namespace LuzernTourismus\MarketingProgramm\Data\AktivitaetChangeLog;
class AktivitaetChangeLogRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var AktivitaetChangeLogModel
*/
public $model;

/**
* @var string
*/
public $id;

/**
* @var int
*/
public $aktivitaetId;

/**
* @var \LuzernTourismus\MarketingProgramm\Reader\Aktivitaet\AktivitaetDataRow
*/
public $aktivitaet;

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
* @var int
*/
public $logId;

/**
* @var \LuzernTourismus\MarketingProgramm\Data\ChangeLog\ChangeLogRow
*/
public $log;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model, $multiLanguage = false) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->aktivitaetId = intval($this->getModelValue($model->aktivitaetId));
if ($model->aktivitaet !== null) {
$this->loadLuzernTourismusMarketingProgrammDataAktivitaetAktivitaetaktivitaetRow($model->aktivitaet);
}
$this->aktivitaetHasChanged = boolval($this->getModelValue($model->aktivitaetHasChanged));
$this->aktivitaetOld = $this->getModelValue($model->aktivitaetOld);
$this->aktivitaetNew = $this->getModelValue($model->aktivitaetNew);
$this->datumHasChanged = boolval($this->getModelValue($model->datumHasChanged));
$this->datumOld = $this->getModelValue($model->datumOld);
$this->datumNew = $this->getModelValue($model->datumNew);
$this->logId = intval($this->getModelValue($model->logId));
if ($model->log !== null) {
$this->loadLuzernTourismusMarketingProgrammDataChangeLogChangeLoglogRow($model->log);
}
}
private function loadLuzernTourismusMarketingProgrammDataAktivitaetAktivitaetaktivitaetRow($model) {
$this->aktivitaet = new \LuzernTourismus\MarketingProgramm\Reader\Aktivitaet\AktivitaetDataRow($this->row, $model);
}
private function loadLuzernTourismusMarketingProgrammDataChangeLogChangeLoglogRow($model) {
$this->log = new \LuzernTourismus\MarketingProgramm\Data\ChangeLog\ChangeLogRow($this->row, $model);
}
}