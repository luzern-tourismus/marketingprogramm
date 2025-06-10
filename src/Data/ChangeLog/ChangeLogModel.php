<?php
namespace LuzernTourismus\MarketingProgramm\Data\ChangeLog;
class ChangeLogModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\External\Id\UniqueIdExternalIdType
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
* @var \Nemundo\Model\Type\External\Id\NumberExternalIdType
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
* @var \Nemundo\Model\Type\External\Id\NumberExternalIdType
*/
public $operationId;

/**
* @var \LuzernTourismus\MarketingProgramm\Data\ChangeLogOperation\ChangeLogOperationExternalType
*/
public $operation;

protected function loadModel() {
$this->tableName = "marketingprogramm_change_log";
$this->aliasTableName = "marketingprogramm_change_log";
$this->label = "Change Log";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "marketingprogramm_change_log";
$this->id->externalTableName = "marketingprogramm_change_log";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "marketingprogramm_change_log_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->userId = new \Nemundo\Model\Type\External\Id\UniqueIdExternalIdType($this);
$this->userId->tableName = "marketingprogramm_change_log";
$this->userId->fieldName = "user";
$this->userId->aliasFieldName = "marketingprogramm_change_log_user";
$this->userId->label = "User";
$this->userId->allowNullValue = false;

$this->dateTime = new \Nemundo\Model\Type\DateTime\DateTimeType($this);
$this->dateTime->tableName = "marketingprogramm_change_log";
$this->dateTime->externalTableName = "marketingprogramm_change_log";
$this->dateTime->fieldName = "date_time";
$this->dateTime->aliasFieldName = "marketingprogramm_change_log_date_time";
$this->dateTime->label = "Date Time";
$this->dateTime->allowNullValue = false;

$this->changeLogTypeId = new \Nemundo\Model\Type\External\Id\NumberExternalIdType($this);
$this->changeLogTypeId->tableName = "marketingprogramm_change_log";
$this->changeLogTypeId->fieldName = "change_log_type";
$this->changeLogTypeId->aliasFieldName = "marketingprogramm_change_log_change_log_type";
$this->changeLogTypeId->label = "Change Log Type";
$this->changeLogTypeId->allowNullValue = false;

$this->dataId = new \Nemundo\Model\Type\Number\NumberType($this);
$this->dataId->tableName = "marketingprogramm_change_log";
$this->dataId->externalTableName = "marketingprogramm_change_log";
$this->dataId->fieldName = "data_id";
$this->dataId->aliasFieldName = "marketingprogramm_change_log_data_id";
$this->dataId->label = "Data Id";
$this->dataId->allowNullValue = false;

$this->operationId = new \Nemundo\Model\Type\External\Id\NumberExternalIdType($this);
$this->operationId->tableName = "marketingprogramm_change_log";
$this->operationId->fieldName = "operation";
$this->operationId->aliasFieldName = "marketingprogramm_change_log_operation";
$this->operationId->label = "Operation";
$this->operationId->allowNullValue = false;

}
public function loadUser() {
if ($this->user == null) {
$this->user = new \Nemundo\User\Data\User\UserExternalType($this, "marketingprogramm_change_log_user");
$this->user->tableName = "marketingprogramm_change_log";
$this->user->fieldName = "user";
$this->user->aliasFieldName = "marketingprogramm_change_log_user";
$this->user->label = "User";
}
return $this;
}
public function loadChangeLogType() {
if ($this->changeLogType == null) {
$this->changeLogType = new \LuzernTourismus\MarketingProgramm\Data\ChangeLogType\ChangeLogTypeExternalType($this, "marketingprogramm_change_log_change_log_type");
$this->changeLogType->tableName = "marketingprogramm_change_log";
$this->changeLogType->fieldName = "change_log_type";
$this->changeLogType->aliasFieldName = "marketingprogramm_change_log_change_log_type";
$this->changeLogType->label = "Change Log Type";
}
return $this;
}
public function loadOperation() {
if ($this->operation == null) {
$this->operation = new \LuzernTourismus\MarketingProgramm\Data\ChangeLogOperation\ChangeLogOperationExternalType($this, "marketingprogramm_change_log_operation");
$this->operation->tableName = "marketingprogramm_change_log";
$this->operation->fieldName = "operation";
$this->operation->aliasFieldName = "marketingprogramm_change_log_operation";
$this->operation->label = "Operation";
}
return $this;
}
}