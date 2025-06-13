<?php
namespace LuzernTourismus\MarketingProgramm\Data\KategorieLog;
class KategorieLogRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var KategorieLogModel
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
* @var bool
*/
public $kategorieHasChanged;

/**
* @var string
*/
public $kategorieOld;

/**
* @var string
*/
public $kategorieNew;

/**
* @var bool
*/
public $themaHasChanged;

/**
* @var int
*/
public $themaOldId;

/**
* @var \LuzernTourismus\MarketingProgramm\Data\Thema\ThemaRow
*/
public $themaOld;

/**
* @var int
*/
public $themaNewId;

/**
* @var \LuzernTourismus\MarketingProgramm\Data\Thema\ThemaRow
*/
public $themaNew;

/**
* @var int
*/
public $kategorieId;

/**
* @var \LuzernTourismus\MarketingProgramm\Data\Kategorie\KategorieRow
*/
public $kategorie;

/**
* @var bool
*/
public $regionHasChanged;

/**
* @var int
*/
public $regionOldId;

/**
* @var \LuzernTourismus\MarketingProgramm\Data\Region\RegionRow
*/
public $regionOld;

/**
* @var int
*/
public $regionNewId;

/**
* @var \LuzernTourismus\MarketingProgramm\Data\Region\RegionRow
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
$this->kategorieHasChanged = boolval($this->getModelValue($model->kategorieHasChanged));
$this->kategorieOld = $this->getModelValue($model->kategorieOld);
$this->kategorieNew = $this->getModelValue($model->kategorieNew);
$this->themaHasChanged = boolval($this->getModelValue($model->themaHasChanged));
$this->themaOldId = intval($this->getModelValue($model->themaOldId));
if ($model->themaOld !== null) {
$this->loadLuzernTourismusMarketingProgrammDataThemaThemathemaOldRow($model->themaOld);
}
$this->themaNewId = intval($this->getModelValue($model->themaNewId));
if ($model->themaNew !== null) {
$this->loadLuzernTourismusMarketingProgrammDataThemaThemathemaNewRow($model->themaNew);
}
$this->kategorieId = intval($this->getModelValue($model->kategorieId));
if ($model->kategorie !== null) {
$this->loadLuzernTourismusMarketingProgrammDataKategorieKategoriekategorieRow($model->kategorie);
}
$this->regionHasChanged = boolval($this->getModelValue($model->regionHasChanged));
$this->regionOldId = intval($this->getModelValue($model->regionOldId));
if ($model->regionOld !== null) {
$this->loadLuzernTourismusMarketingProgrammDataRegionRegionregionOldRow($model->regionOld);
}
$this->regionNewId = intval($this->getModelValue($model->regionNewId));
if ($model->regionNew !== null) {
$this->loadLuzernTourismusMarketingProgrammDataRegionRegionregionNewRow($model->regionNew);
}
}
private function loadLuzernTourismusMarketingProgrammDataChangeLogChangeLoglogRow($model) {
$this->log = new \LuzernTourismus\MarketingProgramm\Data\ChangeLog\ChangeLogRow($this->row, $model);
}
private function loadLuzernTourismusMarketingProgrammDataThemaThemathemaOldRow($model) {
$this->themaOld = new \LuzernTourismus\MarketingProgramm\Data\Thema\ThemaRow($this->row, $model);
}
private function loadLuzernTourismusMarketingProgrammDataThemaThemathemaNewRow($model) {
$this->themaNew = new \LuzernTourismus\MarketingProgramm\Data\Thema\ThemaRow($this->row, $model);
}
private function loadLuzernTourismusMarketingProgrammDataKategorieKategoriekategorieRow($model) {
$this->kategorie = new \LuzernTourismus\MarketingProgramm\Data\Kategorie\KategorieRow($this->row, $model);
}
private function loadLuzernTourismusMarketingProgrammDataRegionRegionregionOldRow($model) {
$this->regionOld = new \LuzernTourismus\MarketingProgramm\Data\Region\RegionRow($this->row, $model);
}
private function loadLuzernTourismusMarketingProgrammDataRegionRegionregionNewRow($model) {
$this->regionNew = new \LuzernTourismus\MarketingProgramm\Data\Region\RegionRow($this->row, $model);
}
}