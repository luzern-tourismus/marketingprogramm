<?php
namespace LuzernTourismus\MarketingProgramm\Data\Option;
class OptionRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var OptionModel
*/
public $model;

/**
* @var string
*/
public $id;

/**
* @var bool
*/
public $isDeleted;

/**
* @var int
*/
public $aktivitaetId;

/**
* @var \LuzernTourismus\MarketingProgramm\Reader\Aktivitaet\AktivitaetDataRow
*/
public $aktivitaet;

/**
* @var string
*/
public $option;

/**
* @var bool
*/
public $hasPreis;

/**
* @var int
*/
public $preis;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model, $multiLanguage = false) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->isDeleted = boolval($this->getModelValue($model->isDeleted));
$this->aktivitaetId = intval($this->getModelValue($model->aktivitaetId));
if ($model->aktivitaet !== null) {
$this->loadLuzernTourismusMarketingProgrammDataAktivitaetAktivitaetaktivitaetRow($model->aktivitaet);
}
$this->option = $this->getModelValue($model->option);
$this->hasPreis = boolval($this->getModelValue($model->hasPreis));
$this->preis = intval($this->getModelValue($model->preis));
}
private function loadLuzernTourismusMarketingProgrammDataAktivitaetAktivitaetaktivitaetRow($model) {
$this->aktivitaet = new \LuzernTourismus\MarketingProgramm\Reader\Aktivitaet\AktivitaetDataRow($this->row, $model);
}
}