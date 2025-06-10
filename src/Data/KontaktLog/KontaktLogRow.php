<?php
namespace LuzernTourismus\MarketingProgramm\Data\KontaktLog;
class KontaktLogRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var KontaktLogModel
*/
public $model;

/**
* @var string
*/
public $id;

/**
* @var int
*/
public $kontaktId;

/**
* @var \LuzernTourismus\MarketingProgramm\Reader\Kontakt\KontaktDataRow
*/
public $kontakt;

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
public $nachnameHasChanged;

/**
* @var string
*/
public $nachnameOld;

/**
* @var string
*/
public $nachnameNew;

/**
* @var bool
*/
public $vornameHasChanged;

/**
* @var string
*/
public $vornameOld;

/**
* @var string
*/
public $vornameNew;

/**
* @var bool
*/
public $emailHasChanged;

/**
* @var string
*/
public $emailOld;

/**
* @var string
*/
public $emailNew;

/**
* @var bool
*/
public $telefonHasChanged;

/**
* @var string
*/
public $telefonOld;

/**
* @var string
*/
public $telefonNew;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model, $multiLanguage = false) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->kontaktId = intval($this->getModelValue($model->kontaktId));
if ($model->kontakt !== null) {
$this->loadLuzernTourismusMarketingProgrammDataKontaktKontaktkontaktRow($model->kontakt);
}
$this->logId = intval($this->getModelValue($model->logId));
if ($model->log !== null) {
$this->loadLuzernTourismusMarketingProgrammDataChangeLogChangeLoglogRow($model->log);
}
$this->nachnameHasChanged = boolval($this->getModelValue($model->nachnameHasChanged));
$this->nachnameOld = $this->getModelValue($model->nachnameOld);
$this->nachnameNew = $this->getModelValue($model->nachnameNew);
$this->vornameHasChanged = boolval($this->getModelValue($model->vornameHasChanged));
$this->vornameOld = $this->getModelValue($model->vornameOld);
$this->vornameNew = $this->getModelValue($model->vornameNew);
$this->emailHasChanged = boolval($this->getModelValue($model->emailHasChanged));
$this->emailOld = $this->getModelValue($model->emailOld);
$this->emailNew = $this->getModelValue($model->emailNew);
$this->telefonHasChanged = boolval($this->getModelValue($model->telefonHasChanged));
$this->telefonOld = $this->getModelValue($model->telefonOld);
$this->telefonNew = $this->getModelValue($model->telefonNew);
}
private function loadLuzernTourismusMarketingProgrammDataKontaktKontaktkontaktRow($model) {
$this->kontakt = new \LuzernTourismus\MarketingProgramm\Reader\Kontakt\KontaktDataRow($this->row, $model);
}
private function loadLuzernTourismusMarketingProgrammDataChangeLogChangeLoglogRow($model) {
$this->log = new \LuzernTourismus\MarketingProgramm\Data\ChangeLog\ChangeLogRow($this->row, $model);
}
}