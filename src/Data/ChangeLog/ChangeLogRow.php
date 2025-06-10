<?php
namespace LuzernTourismus\MarketingProgramm\Data\ChangeLog;
class ChangeLogRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var ChangeLogModel
*/
public $model;

/**
* @var string
*/
public $id;

/**
* @var string
*/
public $userId;

/**
* @var \Nemundo\User\Reader\User\UserDataRow
*/
public $user;

/**
* @var \Nemundo\Core\Type\DateTime\DateTime
*/
public $dateTime;

/**
* @var int
*/
public $changeLogTypeId;

/**
* @var \LuzernTourismus\MarketingProgramm\Data\ChangeLogType\ChangeLogTypeRow
*/
public $changeLogType;

/**
* @var int
*/
public $dataId;

/**
* @var int
*/
public $operationId;

/**
* @var \LuzernTourismus\MarketingProgramm\Data\ChangeLogOperation\ChangeLogOperationRow
*/
public $operation;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model, $multiLanguage = false) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->userId = $this->getModelValue($model->userId);
if ($model->user !== null) {
$this->loadNemundoUserDataUserUseruserRow($model->user);
}
$this->dateTime = new \Nemundo\Core\Type\DateTime\DateTime($this->getModelValue($model->dateTime));
$this->changeLogTypeId = intval($this->getModelValue($model->changeLogTypeId));
if ($model->changeLogType !== null) {
$this->loadLuzernTourismusMarketingProgrammDataChangeLogTypeChangeLogTypechangeLogTypeRow($model->changeLogType);
}
$this->dataId = intval($this->getModelValue($model->dataId));
$this->operationId = intval($this->getModelValue($model->operationId));
if ($model->operation !== null) {
$this->loadLuzernTourismusMarketingProgrammDataChangeLogOperationChangeLogOperationoperationRow($model->operation);
}
}
private function loadNemundoUserDataUserUseruserRow($model) {
$this->user = new \Nemundo\User\Reader\User\UserDataRow($this->row, $model);
}
private function loadLuzernTourismusMarketingProgrammDataChangeLogTypeChangeLogTypechangeLogTypeRow($model) {
$this->changeLogType = new \LuzernTourismus\MarketingProgramm\Data\ChangeLogType\ChangeLogTypeRow($this->row, $model);
}
private function loadLuzernTourismusMarketingProgrammDataChangeLogOperationChangeLogOperationoperationRow($model) {
$this->operation = new \LuzernTourismus\MarketingProgramm\Data\ChangeLogOperation\ChangeLogOperationRow($this->row, $model);
}
}