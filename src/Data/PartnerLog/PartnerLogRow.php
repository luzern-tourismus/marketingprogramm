<?php
namespace LuzernTourismus\MarketingProgramm\Data\PartnerLog;
class PartnerLogRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var PartnerLogModel
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
* @var \LuzernTourismus\MarketingProgramm\Reader\Partner\PartnerDataRow
*/
public $partner;

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
public $firmaHasChanged;

/**
* @var string
*/
public $firmaOld;

/**
* @var string
*/
public $firmaNew;

/**
* @var bool
*/
public $strasseHasChanged;

/**
* @var string
*/
public $strasseOld;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model, $multiLanguage = false) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->partnerId = intval($this->getModelValue($model->partnerId));
if ($model->partner !== null) {
$this->loadLuzernTourismusMarketingProgrammDataPartnerPartnerpartnerRow($model->partner);
}
$this->logId = intval($this->getModelValue($model->logId));
if ($model->log !== null) {
$this->loadLuzernTourismusMarketingProgrammDataChangeLogChangeLoglogRow($model->log);
}
$this->firmaHasChanged = boolval($this->getModelValue($model->firmaHasChanged));
$this->firmaOld = $this->getModelValue($model->firmaOld);
$this->firmaNew = $this->getModelValue($model->firmaNew);
$this->strasseHasChanged = boolval($this->getModelValue($model->strasseHasChanged));
$this->strasseOld = $this->getModelValue($model->strasseOld);
}
private function loadLuzernTourismusMarketingProgrammDataPartnerPartnerpartnerRow($model) {
$this->partner = new \LuzernTourismus\MarketingProgramm\Reader\Partner\PartnerDataRow($this->row, $model);
}
private function loadLuzernTourismusMarketingProgrammDataChangeLogChangeLoglogRow($model) {
$this->log = new \LuzernTourismus\MarketingProgramm\Data\ChangeLog\ChangeLogRow($this->row, $model);
}
}