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
public $partnerId;

/**
* @var \LuzernTourismus\MarketingProgramm\Data\Partner\PartnerRow
*/
public $partner;

/**
* @var bool
*/
public $isDeleted;

/**
* @var int
*/
public $optionId;

/**
* @var \LuzernTourismus\MarketingProgramm\Reader\Option\OptionDataRow
*/
public $option;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model, $multiLanguage = false) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->partnerId = intval($this->getModelValue($model->partnerId));
if ($model->partner !== null) {
$this->loadLuzernTourismusMarketingProgrammDataPartnerPartnerpartnerRow($model->partner);
}
$this->isDeleted = boolval($this->getModelValue($model->isDeleted));
$this->optionId = intval($this->getModelValue($model->optionId));
if ($model->option !== null) {
$this->loadLuzernTourismusMarketingProgrammDataOptionOptionoptionRow($model->option);
}
}
private function loadLuzernTourismusMarketingProgrammDataPartnerPartnerpartnerRow($model) {
$this->partner = new \LuzernTourismus\MarketingProgramm\Data\Partner\PartnerRow($this->row, $model);
}
private function loadLuzernTourismusMarketingProgrammDataOptionOptionoptionRow($model) {
$this->option = new \LuzernTourismus\MarketingProgramm\Reader\Option\OptionDataRow($this->row, $model);
}
}