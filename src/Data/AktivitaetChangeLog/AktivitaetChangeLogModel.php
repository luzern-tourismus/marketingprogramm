<?php
namespace LuzernTourismus\MarketingProgramm\Data\AktivitaetChangeLog;
class AktivitaetChangeLogModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\External\Id\NumberExternalIdType
*/
public $aktivitaetId;

/**
* @var \LuzernTourismus\MarketingProgramm\Data\Aktivitaet\AktivitaetExternalType
*/
public $aktivitaet;

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
* @var \Nemundo\Model\Type\Number\YesNoType
*/
public $aktivitaetHasChanged;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $aktivitaetOld;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $aktivitaetNew;

protected function loadModel() {
$this->tableName = "marketingprogramm_aktivitaet_change_log";
$this->aliasTableName = "marketingprogramm_aktivitaet_change_log";
$this->label = "Aktivität Change Log";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "marketingprogramm_aktivitaet_change_log";
$this->id->externalTableName = "marketingprogramm_aktivitaet_change_log";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "marketingprogramm_aktivitaet_change_log_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->aktivitaetId = new \Nemundo\Model\Type\External\Id\NumberExternalIdType($this);
$this->aktivitaetId->tableName = "marketingprogramm_aktivitaet_change_log";
$this->aktivitaetId->fieldName = "aktivitaet";
$this->aktivitaetId->aliasFieldName = "marketingprogramm_aktivitaet_change_log_aktivitaet";
$this->aktivitaetId->label = "Aktivität";
$this->aktivitaetId->allowNullValue = false;

$this->userId = new \Nemundo\Model\Type\External\Id\UniqueIdExternalIdType($this);
$this->userId->tableName = "marketingprogramm_aktivitaet_change_log";
$this->userId->fieldName = "user";
$this->userId->aliasFieldName = "marketingprogramm_aktivitaet_change_log_user";
$this->userId->label = "User";
$this->userId->allowNullValue = false;

$this->dateTime = new \Nemundo\Model\Type\DateTime\DateTimeType($this);
$this->dateTime->tableName = "marketingprogramm_aktivitaet_change_log";
$this->dateTime->externalTableName = "marketingprogramm_aktivitaet_change_log";
$this->dateTime->fieldName = "date_time";
$this->dateTime->aliasFieldName = "marketingprogramm_aktivitaet_change_log_date_time";
$this->dateTime->label = "Date Time";
$this->dateTime->allowNullValue = false;

$this->aktivitaetHasChanged = new \Nemundo\Model\Type\Number\YesNoType($this);
$this->aktivitaetHasChanged->tableName = "marketingprogramm_aktivitaet_change_log";
$this->aktivitaetHasChanged->externalTableName = "marketingprogramm_aktivitaet_change_log";
$this->aktivitaetHasChanged->fieldName = "aktivitaet_has_changed";
$this->aktivitaetHasChanged->aliasFieldName = "marketingprogramm_aktivitaet_change_log_aktivitaet_has_changed";
$this->aktivitaetHasChanged->label = "Aktivität Has Changed";
$this->aktivitaetHasChanged->allowNullValue = false;

$this->aktivitaetOld = new \Nemundo\Model\Type\Text\TextType($this);
$this->aktivitaetOld->tableName = "marketingprogramm_aktivitaet_change_log";
$this->aktivitaetOld->externalTableName = "marketingprogramm_aktivitaet_change_log";
$this->aktivitaetOld->fieldName = "aktivitaet_old";
$this->aktivitaetOld->aliasFieldName = "marketingprogramm_aktivitaet_change_log_aktivitaet_old";
$this->aktivitaetOld->label = "Aktivität Old";
$this->aktivitaetOld->allowNullValue = true;
$this->aktivitaetOld->length = 255;

$this->aktivitaetNew = new \Nemundo\Model\Type\Text\TextType($this);
$this->aktivitaetNew->tableName = "marketingprogramm_aktivitaet_change_log";
$this->aktivitaetNew->externalTableName = "marketingprogramm_aktivitaet_change_log";
$this->aktivitaetNew->fieldName = "aktivitaet_new";
$this->aktivitaetNew->aliasFieldName = "marketingprogramm_aktivitaet_change_log_aktivitaet_new";
$this->aktivitaetNew->label = "Aktivität New";
$this->aktivitaetNew->allowNullValue = true;
$this->aktivitaetNew->length = 255;

}
public function loadAktivitaet() {
if ($this->aktivitaet == null) {
$this->aktivitaet = new \LuzernTourismus\MarketingProgramm\Data\Aktivitaet\AktivitaetExternalType($this, "marketingprogramm_aktivitaet_change_log_aktivitaet");
$this->aktivitaet->tableName = "marketingprogramm_aktivitaet_change_log";
$this->aktivitaet->fieldName = "aktivitaet";
$this->aktivitaet->aliasFieldName = "marketingprogramm_aktivitaet_change_log_aktivitaet";
$this->aktivitaet->label = "Aktivität";
}
return $this;
}
public function loadUser() {
if ($this->user == null) {
$this->user = new \Nemundo\User\Data\User\UserExternalType($this, "marketingprogramm_aktivitaet_change_log_user");
$this->user->tableName = "marketingprogramm_aktivitaet_change_log";
$this->user->fieldName = "user";
$this->user->aliasFieldName = "marketingprogramm_aktivitaet_change_log_user";
$this->user->label = "User";
}
return $this;
}
}