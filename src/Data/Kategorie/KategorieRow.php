<?php
namespace LuzernTourismus\MarketingProgramm\Data\Kategorie;
class KategorieRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var KategorieModel
*/
public $model;

/**
* @var string
*/
public $id;

/**
* @var string
*/
public $kategorie;

/**
* @var int
*/
public $themaId;

/**
* @var \LuzernTourismus\MarketingProgramm\Data\Thema\ThemaRow
*/
public $thema;

/**
* @var bool
*/
public $isDeleted;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model, $multiLanguage = false) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->kategorie = $this->getModelValue($model->kategorie);
$this->themaId = intval($this->getModelValue($model->themaId));
if ($model->thema !== null) {
$this->loadLuzernTourismusMarketingProgrammDataThemaThemathemaRow($model->thema);
}
$this->isDeleted = boolval($this->getModelValue($model->isDeleted));
}
private function loadLuzernTourismusMarketingProgrammDataThemaThemathemaRow($model) {
$this->thema = new \LuzernTourismus\MarketingProgramm\Data\Thema\ThemaRow($this->row, $model);
}
}