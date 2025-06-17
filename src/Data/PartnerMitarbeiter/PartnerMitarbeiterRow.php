<?php
namespace LuzernTourismus\MarketingProgramm\Data\PartnerMitarbeiter;
class PartnerMitarbeiterRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var PartnerMitarbeiterModel
*/
public $model;

/**
* @var string
*/
public $id;

/**
* @var int
*/
public $partnerId;

/**
* @var \LuzernTourismus\MarketingProgramm\Data\Partner\PartnerRow
*/
public $partner;

/**
* @var string
*/
public $name;

/**
* @var string
*/
public $vorname;

/**
* @var string
*/
public $email;

/**
* @var bool
*/
public $isDeleted;

/**
* @var int
*/
public $anredeId;

/**
* @var \LuzernTourismus\MarketingProgramm\Data\Anrede\AnredeRow
*/
public $anrede;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model, $multiLanguage = false) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->partnerId = intval($this->getModelValue($model->partnerId));
if ($model->partner !== null) {
$this->loadLuzernTourismusMarketingProgrammDataPartnerPartnerpartnerRow($model->partner);
}
$this->name = $this->getModelValue($model->name);
$this->vorname = $this->getModelValue($model->vorname);
$this->email = $this->getModelValue($model->email);
$this->isDeleted = boolval($this->getModelValue($model->isDeleted));
$this->anredeId = intval($this->getModelValue($model->anredeId));
if ($model->anrede !== null) {
$this->loadLuzernTourismusMarketingProgrammDataAnredeAnredeanredeRow($model->anrede);
}
}
private function loadLuzernTourismusMarketingProgrammDataPartnerPartnerpartnerRow($model) {
$this->partner = new \LuzernTourismus\MarketingProgramm\Data\Partner\PartnerRow($this->row, $model);
}
private function loadLuzernTourismusMarketingProgrammDataAnredeAnredeanredeRow($model) {
$this->anrede = new \LuzernTourismus\MarketingProgramm\Data\Anrede\AnredeRow($this->row, $model);
}
}