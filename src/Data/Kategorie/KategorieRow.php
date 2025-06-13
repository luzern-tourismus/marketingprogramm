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

/**
* @var int
*/
public $regionId;

/**
* @var \LuzernTourismus\MarketingProgramm\Data\Region\RegionRow
*/
public $region;

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
$this->regionId = intval($this->getModelValue($model->regionId));
if ($model->region !== null) {
$this->loadLuzernTourismusMarketingProgrammDataRegionRegionregionRow($model->region);
}
}
private function loadLuzernTourismusMarketingProgrammDataThemaThemathemaRow($model) {
$this->thema = new \LuzernTourismus\MarketingProgramm\Data\Thema\ThemaRow($this->row, $model);
}
private function loadLuzernTourismusMarketingProgrammDataRegionRegionregionRow($model) {
$this->region = new \LuzernTourismus\MarketingProgramm\Data\Region\RegionRow($this->row, $model);
}
}