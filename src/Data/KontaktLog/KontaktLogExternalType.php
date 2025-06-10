<?php
namespace LuzernTourismus\MarketingProgramm\Data\KontaktLog;
class KontaktLogExternalType extends \Nemundo\Model\Type\External\ExternalType {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $kontaktId;

/**
* @var \LuzernTourismus\MarketingProgramm\Data\Kontakt\KontaktExternalType
*/
public $kontakt;

/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $logId;

/**
* @var \LuzernTourismus\MarketingProgramm\Data\ChangeLog\ChangeLogExternalType
*/
public $log;

/**
* @var \Nemundo\Model\Type\Number\YesNoType
*/
public $nachnameHasChanged;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $nachnameOld;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $nachnameNew;

/**
* @var \Nemundo\Model\Type\Number\YesNoType
*/
public $vornameHasChanged;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $vornameOld;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $vornameNew;

/**
* @var \Nemundo\Model\Type\Number\YesNoType
*/
public $emailHasChanged;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $emailOld;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $emailNew;

/**
* @var \Nemundo\Model\Type\Number\YesNoType
*/
public $telefonHasChanged;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $telefonOld;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $telefonNew;

protected function loadExternalType() {
parent::loadExternalType();
$this->externalModelClassName = KontaktLogModel::class;
$this->externalTableName = "marketingprogramm_kontakt_log";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->externalTableName = $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->kontaktId = new \Nemundo\Model\Type\Id\IdType();
$this->kontaktId->fieldName = "kontakt";
$this->kontaktId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->kontaktId->aliasFieldName = $this->kontaktId->tableName ."_".$this->kontaktId->fieldName;
$this->kontaktId->label = "Kontakt";
$this->addType($this->kontaktId);

$this->logId = new \Nemundo\Model\Type\Id\IdType();
$this->logId->fieldName = "log";
$this->logId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->logId->aliasFieldName = $this->logId->tableName ."_".$this->logId->fieldName;
$this->logId->label = "Log";
$this->addType($this->logId);

$this->nachnameHasChanged = new \Nemundo\Model\Type\Number\YesNoType();
$this->nachnameHasChanged->fieldName = "nachname_has_changed";
$this->nachnameHasChanged->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->nachnameHasChanged->externalTableName = $this->externalTableName;
$this->nachnameHasChanged->aliasFieldName = $this->nachnameHasChanged->tableName . "_" . $this->nachnameHasChanged->fieldName;
$this->nachnameHasChanged->label = "Nachname Has Changed";
$this->addType($this->nachnameHasChanged);

$this->nachnameOld = new \Nemundo\Model\Type\Text\TextType();
$this->nachnameOld->fieldName = "nachname_old";
$this->nachnameOld->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->nachnameOld->externalTableName = $this->externalTableName;
$this->nachnameOld->aliasFieldName = $this->nachnameOld->tableName . "_" . $this->nachnameOld->fieldName;
$this->nachnameOld->label = "Nachname Old";
$this->addType($this->nachnameOld);

$this->nachnameNew = new \Nemundo\Model\Type\Text\TextType();
$this->nachnameNew->fieldName = "nachname_new";
$this->nachnameNew->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->nachnameNew->externalTableName = $this->externalTableName;
$this->nachnameNew->aliasFieldName = $this->nachnameNew->tableName . "_" . $this->nachnameNew->fieldName;
$this->nachnameNew->label = "Nachname New";
$this->addType($this->nachnameNew);

$this->vornameHasChanged = new \Nemundo\Model\Type\Number\YesNoType();
$this->vornameHasChanged->fieldName = "vorname_has_changed";
$this->vornameHasChanged->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->vornameHasChanged->externalTableName = $this->externalTableName;
$this->vornameHasChanged->aliasFieldName = $this->vornameHasChanged->tableName . "_" . $this->vornameHasChanged->fieldName;
$this->vornameHasChanged->label = "Vorname Has Changed";
$this->addType($this->vornameHasChanged);

$this->vornameOld = new \Nemundo\Model\Type\Text\TextType();
$this->vornameOld->fieldName = "vorname_old";
$this->vornameOld->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->vornameOld->externalTableName = $this->externalTableName;
$this->vornameOld->aliasFieldName = $this->vornameOld->tableName . "_" . $this->vornameOld->fieldName;
$this->vornameOld->label = "Vorname Old";
$this->addType($this->vornameOld);

$this->vornameNew = new \Nemundo\Model\Type\Text\TextType();
$this->vornameNew->fieldName = "vorname_new";
$this->vornameNew->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->vornameNew->externalTableName = $this->externalTableName;
$this->vornameNew->aliasFieldName = $this->vornameNew->tableName . "_" . $this->vornameNew->fieldName;
$this->vornameNew->label = "Vorname New";
$this->addType($this->vornameNew);

$this->emailHasChanged = new \Nemundo\Model\Type\Number\YesNoType();
$this->emailHasChanged->fieldName = "email_has_changed";
$this->emailHasChanged->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->emailHasChanged->externalTableName = $this->externalTableName;
$this->emailHasChanged->aliasFieldName = $this->emailHasChanged->tableName . "_" . $this->emailHasChanged->fieldName;
$this->emailHasChanged->label = "Email Has Changed";
$this->addType($this->emailHasChanged);

$this->emailOld = new \Nemundo\Model\Type\Text\TextType();
$this->emailOld->fieldName = "email_old";
$this->emailOld->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->emailOld->externalTableName = $this->externalTableName;
$this->emailOld->aliasFieldName = $this->emailOld->tableName . "_" . $this->emailOld->fieldName;
$this->emailOld->label = "Email Old";
$this->addType($this->emailOld);

$this->emailNew = new \Nemundo\Model\Type\Text\TextType();
$this->emailNew->fieldName = "email_new";
$this->emailNew->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->emailNew->externalTableName = $this->externalTableName;
$this->emailNew->aliasFieldName = $this->emailNew->tableName . "_" . $this->emailNew->fieldName;
$this->emailNew->label = "Email New";
$this->addType($this->emailNew);

$this->telefonHasChanged = new \Nemundo\Model\Type\Number\YesNoType();
$this->telefonHasChanged->fieldName = "telefon_has_changed";
$this->telefonHasChanged->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->telefonHasChanged->externalTableName = $this->externalTableName;
$this->telefonHasChanged->aliasFieldName = $this->telefonHasChanged->tableName . "_" . $this->telefonHasChanged->fieldName;
$this->telefonHasChanged->label = "Telefon Has Changed";
$this->addType($this->telefonHasChanged);

$this->telefonOld = new \Nemundo\Model\Type\Text\TextType();
$this->telefonOld->fieldName = "telefon_old";
$this->telefonOld->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->telefonOld->externalTableName = $this->externalTableName;
$this->telefonOld->aliasFieldName = $this->telefonOld->tableName . "_" . $this->telefonOld->fieldName;
$this->telefonOld->label = "Telefon Old";
$this->addType($this->telefonOld);

$this->telefonNew = new \Nemundo\Model\Type\Text\TextType();
$this->telefonNew->fieldName = "telefon_new";
$this->telefonNew->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->telefonNew->externalTableName = $this->externalTableName;
$this->telefonNew->aliasFieldName = $this->telefonNew->tableName . "_" . $this->telefonNew->fieldName;
$this->telefonNew->label = "Telefon New";
$this->addType($this->telefonNew);

}
public function loadKontakt() {
if ($this->kontakt == null) {
$this->kontakt = new \LuzernTourismus\MarketingProgramm\Data\Kontakt\KontaktExternalType(null, $this->parentFieldName . "_kontakt");
$this->kontakt->fieldName = "kontakt";
$this->kontakt->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->kontakt->aliasFieldName = $this->kontakt->tableName ."_".$this->kontakt->fieldName;
$this->kontakt->label = "Kontakt";
$this->addType($this->kontakt);
}
return $this;
}
public function loadLog() {
if ($this->log == null) {
$this->log = new \LuzernTourismus\MarketingProgramm\Data\ChangeLog\ChangeLogExternalType(null, $this->parentFieldName . "_log");
$this->log->fieldName = "log";
$this->log->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->log->aliasFieldName = $this->log->tableName ."_".$this->log->fieldName;
$this->log->label = "Log";
$this->addType($this->log);
}
return $this;
}
}