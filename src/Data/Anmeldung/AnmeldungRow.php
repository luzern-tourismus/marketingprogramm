<?php
namespace LuzernTourismus\MarketingProgramm\Data\Anmeldung;
class AnmeldungRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var AnmeldungModel
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
* @var \LuzernTourismus\MarketingProgramm\Data\Aktivitaet\AktivitaetRow
*/
public $aktivitaet;

/**
* @var int
*/
public $partnerId;

/**
* @var \LuzernTourismus\MarketingProgramm\Data\Partner\PartnerRow
*/
public $partner;

/**
* @var bool
*/
public $isDeleted;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model, $multiLanguage = false) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->aktivitaetId = intval($this->getModelValue($model->aktivitaetId));
if ($model->aktivitaet !== null) {
$this->loadLuzernTourismusMarketingProgrammDataAktivitaetAktivitaetaktivitaetRow($model->aktivitaet);
}
$this->partnerId = intval($this->getModelValue($model->partnerId));
if ($model->partner !== null) {
$this->loadLuzernTourismusMarketingProgrammDataPartnerPartnerpartnerRow($model->partner);
}
$this->isDeleted = boolval($this->getModelValue($model->isDeleted));
}
private function loadLuzernTourismusMarketingProgrammDataAktivitaetAktivitaetaktivitaetRow($model) {
$this->aktivitaet = new \LuzernTourismus\MarketingProgramm\Data\Aktivitaet\AktivitaetRow($this->row, $model);
}
private function loadLuzernTourismusMarketingProgrammDataPartnerPartnerpartnerRow($model) {
$this->partner = new \LuzernTourismus\MarketingProgramm\Data\Partner\PartnerRow($this->row, $model);
}
}