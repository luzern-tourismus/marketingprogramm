<?php
namespace LuzernTourismus\MarketingProgramm\Data\Aktivitaet;
class AktivitaetRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var AktivitaetModel
*/
public $model;

/**
* @var string
*/
public $id;

/**
* @var string
*/
public $aktivitaet;

/**
* @var string
*/
public $datum;

/**
* @var string
*/
public $kosten;

/**
* @var string
*/
public $leistung;

/**
* @var string
*/
public $zielpublikum;

/**
* @var int
*/
public $kategorieId;

/**
* @var \LuzernTourismus\MarketingProgramm\Data\Kategorie\KategorieRow
*/
public $kategorie;

/**
* @var int
*/
public $kontaktId;

/**
* @var \LuzernTourismus\MarketingProgramm\Reader\Kontakt\KontaktDataRow
*/
public $kontakt;

/**
* @var bool
*/
public $isDeleted;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model, $multiLanguage = false) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->aktivitaet = $this->getModelValue($model->aktivitaet);
$this->datum = $this->getModelValue($model->datum);
$this->kosten = $this->getModelValue($model->kosten);
$this->leistung = $this->getModelValue($model->leistung);
$this->zielpublikum = $this->getModelValue($model->zielpublikum);
$this->kategorieId = intval($this->getModelValue($model->kategorieId));
if ($model->kategorie !== null) {
$this->loadLuzernTourismusMarketingProgrammDataKategorieKategoriekategorieRow($model->kategorie);
}
$this->kontaktId = intval($this->getModelValue($model->kontaktId));
if ($model->kontakt !== null) {
$this->loadLuzernTourismusMarketingProgrammDataKontaktKontaktkontaktRow($model->kontakt);
}
$this->isDeleted = boolval($this->getModelValue($model->isDeleted));
}
private function loadLuzernTourismusMarketingProgrammDataKategorieKategoriekategorieRow($model) {
$this->kategorie = new \LuzernTourismus\MarketingProgramm\Data\Kategorie\KategorieRow($this->row, $model);
}
private function loadLuzernTourismusMarketingProgrammDataKontaktKontaktkontaktRow($model) {
$this->kontakt = new \LuzernTourismus\MarketingProgramm\Reader\Kontakt\KontaktDataRow($this->row, $model);
}
}