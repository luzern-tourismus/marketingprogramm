<?php
namespace LuzernTourismus\MarketingProgramm\Data\AktivitaetChangeLog;
class AktivitaetChangeLogExternalType extends \Nemundo\Model\Type\External\ExternalType {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $aktivitaetId;

/**
* @var \LuzernTourismus\MarketingProgramm\Data\Aktivitaet\AktivitaetExternalType
*/
public $aktivitaet;

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

protected function loadExternalType() {
parent::loadExternalType();
$this->externalModelClassName = AktivitaetChangeLogModel::class;
$this->externalTableName = "marketingprogramm_aktivitaet_change_log";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->externalTableName = $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->aktivitaetId = new \Nemundo\Model\Type\Id\IdType();
$this->aktivitaetId->fieldName = "aktivitaet";
$this->aktivitaetId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->aktivitaetId->aliasFieldName = $this->aktivitaetId->tableName ."_".$this->aktivitaetId->fieldName;
$this->aktivitaetId->label = "Aktivität";
$this->addType($this->aktivitaetId);

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

$this->aktivitaetHasChanged = new \Nemundo\Model\Type\Number\YesNoType();
$this->aktivitaetHasChanged->fieldName = "aktivitaet_has_changed";
$this->aktivitaetHasChanged->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->aktivitaetHasChanged->externalTableName = $this->externalTableName;
$this->aktivitaetHasChanged->aliasFieldName = $this->aktivitaetHasChanged->tableName . "_" . $this->aktivitaetHasChanged->fieldName;
$this->aktivitaetHasChanged->label = "Aktivität Has Changed";
$this->addType($this->aktivitaetHasChanged);

$this->aktivitaetOld = new \Nemundo\Model\Type\Text\TextType();
$this->aktivitaetOld->fieldName = "aktivitaet_old";
$this->aktivitaetOld->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->aktivitaetOld->externalTableName = $this->externalTableName;
$this->aktivitaetOld->aliasFieldName = $this->aktivitaetOld->tableName . "_" . $this->aktivitaetOld->fieldName;
$this->aktivitaetOld->label = "Aktivität Old";
$this->addType($this->aktivitaetOld);

$this->aktivitaetNew = new \Nemundo\Model\Type\Text\TextType();
$this->aktivitaetNew->fieldName = "aktivitaet_new";
$this->aktivitaetNew->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->aktivitaetNew->externalTableName = $this->externalTableName;
$this->aktivitaetNew->aliasFieldName = $this->aktivitaetNew->tableName . "_" . $this->aktivitaetNew->fieldName;
$this->aktivitaetNew->label = "Aktivität New";
$this->addType($this->aktivitaetNew);

}
public function loadAktivitaet() {
if ($this->aktivitaet == null) {
$this->aktivitaet = new \LuzernTourismus\MarketingProgramm\Data\Aktivitaet\AktivitaetExternalType(null, $this->parentFieldName . "_aktivitaet");
$this->aktivitaet->fieldName = "aktivitaet";
$this->aktivitaet->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->aktivitaet->aliasFieldName = $this->aktivitaet->tableName ."_".$this->aktivitaet->fieldName;
$this->aktivitaet->label = "Aktivität";
$this->addType($this->aktivitaet);
}
return $this;
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
}