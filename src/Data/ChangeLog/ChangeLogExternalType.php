<?php
namespace LuzernTourismus\MarketingProgramm\Data\ChangeLog;
class ChangeLogExternalType extends \Nemundo\Model\Type\External\ExternalType {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $userId;

/**
* @var \Nemundo\User\Data\User\UserExternalType
*/
public $user;

/**
* @var \Nemundo\Model\Type\DateTime\DateTimeType
*/
public $dateTime;

/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $changeLogTypeId;

/**
* @var \LuzernTourismus\MarketingProgramm\Data\ChangeLogType\ChangeLogTypeExternalType
*/
public $changeLogType;

/**
* @var \Nemundo\Model\Type\Number\NumberType
*/
public $dataId;

/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $operationId;

/**
* @var \LuzernTourismus\MarketingProgramm\Data\ChangeLogOperation\ChangeLogOperationExternalType
*/
public $operation;

protected function loadExternalType() {
parent::loadExternalType();
$this->externalModelClassName = ChangeLogModel::class;
$this->externalTableName = "marketingprogramm_change_log";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->externalTableName = $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->userId = new \Nemundo\Model\Type\Id\IdType();
$this->userId->fieldName = "user";
$this->userId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->userId->aliasFieldName = $this->userId->tableName ."_".$this->userId->fieldName;
$this->userId->label = "User";
$this->addType($this->userId);

$this->dateTime = new \Nemundo\Model\Type\DateTime\DateTimeType();
$this->dateTime->fieldName = "date_time";
$this->dateTime->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->dateTime->externalTableName = $this->externalTableName;
$this->dateTime->aliasFieldName = $this->dateTime->tableName . "_" . $this->dateTime->fieldName;
$this->dateTime->label = "Date Time";
$this->addType($this->dateTime);

$this->changeLogTypeId = new \Nemundo\Model\Type\Id\IdType();
$this->changeLogTypeId->fieldName = "change_log_type";
$this->changeLogTypeId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->changeLogTypeId->aliasFieldName = $this->changeLogTypeId->tableName ."_".$this->changeLogTypeId->fieldName;
$this->changeLogTypeId->label = "Change Log Type";
$this->addType($this->changeLogTypeId);

$this->dataId = new \Nemundo\Model\Type\Number\NumberType();
$this->dataId->fieldName = "data_id";
$this->dataId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->dataId->externalTableName = $this->externalTableName;
$this->dataId->aliasFieldName = $this->dataId->tableName . "_" . $this->dataId->fieldName;
$this->dataId->label = "Data Id";
$this->addType($this->dataId);

$this->operationId = new \Nemundo\Model\Type\Id\IdType();
$this->operationId->fieldName = "operation";
$this->operationId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->operationId->aliasFieldName = $this->operationId->tableName ."_".$this->operationId->fieldName;
$this->operationId->label = "Operation";
$this->addType($this->operationId);

}
public function loadUser() {
if ($this->user == null) {
$this->user = new \Nemundo\User\Data\User\UserExternalType(null, $this->parentFieldName . "_user");
$this->user->fieldName = "user";
$this->user->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->user->aliasFieldName = $this->user->tableName ."_".$this->user->fieldName;
$this->user->label = "User";
$this->addType($this->user);
}
return $this;
}
public function loadChangeLogType() {
if ($this->changeLogType == null) {
$this->changeLogType = new \LuzernTourismus\MarketingProgramm\Data\ChangeLogType\ChangeLogTypeExternalType(null, $this->parentFieldName . "_change_log_type");
$this->changeLogType->fieldName = "change_log_type";
$this->changeLogType->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->changeLogType->aliasFieldName = $this->changeLogType->tableName ."_".$this->changeLogType->fieldName;
$this->changeLogType->label = "Change Log Type";
$this->addType($this->changeLogType);
}
return $this;
}
public function loadOperation() {
if ($this->operation == null) {
$this->operation = new \LuzernTourismus\MarketingProgramm\Data\ChangeLogOperation\ChangeLogOperationExternalType(null, $this->parentFieldName . "_operation");
$this->operation->fieldName = "operation";
$this->operation->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->operation->aliasFieldName = $this->operation->tableName ."_".$this->operation->fieldName;
$this->operation->label = "Operation";
$this->addType($this->operation);
}
return $this;
}
}