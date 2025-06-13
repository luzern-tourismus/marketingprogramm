<?php
namespace LuzernTourismus\MarketingProgramm\Data\RegionLog;
class RegionLogRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var RegionLogModel
*/
public $model;

/**
* @var string
*/
public $id;

/**
* @var int
*/
public $logId;

/**
* @var \LuzernTourismus\MarketingProgramm\Data\ChangeLog\ChangeLogRow
*/
public $log;

/**
* @var int
*/
public $regionId;

/**
* @var \LuzernTourismus\MarketingProgramm\Data\Region\RegionRow
*/
public $region;

/**
* @var bool
*/
public $regionHasChanged;

/**
* @var string
*/
public $regionOld;

/**
* @var string
*/
public $regionNew;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model, $multiLanguage = false) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->logId = intval($this->getModelValue($model->logId));
if ($model->log !== null) {
$this->loadLuzernTourismusMarketingProgrammDataChangeLogChangeLoglogRow($model->log);
}
$this->regionId = intval($this->getModelValue($model->regionId));
if ($model->region !== null) {
$this->loadLuzernTourismusMarketingProgrammDataRegionRegionregionRow($model->region);
}
$this->regionHasChanged = boolval($this->getModelValue($model->regionHasChanged));
$this->regionOld = $this->getModelValue($model->regionOld);
$this->regionNew = $this->getModelValue($model->regionNew);
}
private function loadLuzernTourismusMarketingProgrammDataChangeLogChangeLoglogRow($model) {
$this->log = new \LuzernTourismus\MarketingProgramm\Data\ChangeLog\ChangeLogRow($this->row, $model);
}
private function loadLuzernTourismusMarketingProgrammDataRegionRegionregionRow($model) {
$this->region = new \LuzernTourismus\MarketingProgramm\Data\Region\RegionRow($this->row, $model);
}
}