<?php
namespace LuzernTourismus\MarketingProgramm\Data\KontaktLog;
class KontaktLogModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\External\Id\NumberExternalIdType
*/
public $kontaktId;

/**
* @var \LuzernTourismus\MarketingProgramm\Data\Kontakt\KontaktExternalType
*/
public $kontakt;

/**
* @var \Nemundo\Model\Type\External\Id\NumberExternalIdType
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

protected function loadModel() {
$this->tableName = "marketingprogramm_kontakt_log";
$this->aliasTableName = "marketingprogramm_kontakt_log";
$this->label = "Kontakt Log";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "marketingprogramm_kontakt_log";
$this->id->externalTableName = "marketingprogramm_kontakt_log";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "marketingprogramm_kontakt_log_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->kontaktId = new \Nemundo\Model\Type\External\Id\NumberExternalIdType($this);
$this->kontaktId->tableName = "marketingprogramm_kontakt_log";
$this->kontaktId->fieldName = "kontakt";
$this->kontaktId->aliasFieldName = "marketingprogramm_kontakt_log_kontakt";
$this->kontaktId->label = "Kontakt";
$this->kontaktId->allowNullValue = false;

$this->logId = new \Nemundo\Model\Type\External\Id\NumberExternalIdType($this);
$this->logId->tableName = "marketingprogramm_kontakt_log";
$this->logId->fieldName = "log";
$this->logId->aliasFieldName = "marketingprogramm_kontakt_log_log";
$this->logId->label = "Log";
$this->logId->allowNullValue = false;

$this->nachnameHasChanged = new \Nemundo\Model\Type\Number\YesNoType($this);
$this->nachnameHasChanged->tableName = "marketingprogramm_kontakt_log";
$this->nachnameHasChanged->externalTableName = "marketingprogramm_kontakt_log";
$this->nachnameHasChanged->fieldName = "nachname_has_changed";
$this->nachnameHasChanged->aliasFieldName = "marketingprogramm_kontakt_log_nachname_has_changed";
$this->nachnameHasChanged->label = "Nachname Has Changed";
$this->nachnameHasChanged->allowNullValue = false;

$this->nachnameOld = new \Nemundo\Model\Type\Text\TextType($this);
$this->nachnameOld->tableName = "marketingprogramm_kontakt_log";
$this->nachnameOld->externalTableName = "marketingprogramm_kontakt_log";
$this->nachnameOld->fieldName = "nachname_old";
$this->nachnameOld->aliasFieldName = "marketingprogramm_kontakt_log_nachname_old";
$this->nachnameOld->label = "Nachname Old";
$this->nachnameOld->allowNullValue = true;
$this->nachnameOld->length = 255;

$this->nachnameNew = new \Nemundo\Model\Type\Text\TextType($this);
$this->nachnameNew->tableName = "marketingprogramm_kontakt_log";
$this->nachnameNew->externalTableName = "marketingprogramm_kontakt_log";
$this->nachnameNew->fieldName = "nachname_new";
$this->nachnameNew->aliasFieldName = "marketingprogramm_kontakt_log_nachname_new";
$this->nachnameNew->label = "Nachname New";
$this->nachnameNew->allowNullValue = true;
$this->nachnameNew->length = 255;

$this->vornameHasChanged = new \Nemundo\Model\Type\Number\YesNoType($this);
$this->vornameHasChanged->tableName = "marketingprogramm_kontakt_log";
$this->vornameHasChanged->externalTableName = "marketingprogramm_kontakt_log";
$this->vornameHasChanged->fieldName = "vorname_has_changed";
$this->vornameHasChanged->aliasFieldName = "marketingprogramm_kontakt_log_vorname_has_changed";
$this->vornameHasChanged->label = "Vorname Has Changed";
$this->vornameHasChanged->allowNullValue = false;

$this->vornameOld = new \Nemundo\Model\Type\Text\TextType($this);
$this->vornameOld->tableName = "marketingprogramm_kontakt_log";
$this->vornameOld->externalTableName = "marketingprogramm_kontakt_log";
$this->vornameOld->fieldName = "vorname_old";
$this->vornameOld->aliasFieldName = "marketingprogramm_kontakt_log_vorname_old";
$this->vornameOld->label = "Vorname Old";
$this->vornameOld->allowNullValue = true;
$this->vornameOld->length = 255;

$this->vornameNew = new \Nemundo\Model\Type\Text\TextType($this);
$this->vornameNew->tableName = "marketingprogramm_kontakt_log";
$this->vornameNew->externalTableName = "marketingprogramm_kontakt_log";
$this->vornameNew->fieldName = "vorname_new";
$this->vornameNew->aliasFieldName = "marketingprogramm_kontakt_log_vorname_new";
$this->vornameNew->label = "Vorname New";
$this->vornameNew->allowNullValue = true;
$this->vornameNew->length = 255;

$this->emailHasChanged = new \Nemundo\Model\Type\Number\YesNoType($this);
$this->emailHasChanged->tableName = "marketingprogramm_kontakt_log";
$this->emailHasChanged->externalTableName = "marketingprogramm_kontakt_log";
$this->emailHasChanged->fieldName = "email_has_changed";
$this->emailHasChanged->aliasFieldName = "marketingprogramm_kontakt_log_email_has_changed";
$this->emailHasChanged->label = "Email Has Changed";
$this->emailHasChanged->allowNullValue = false;

$this->emailOld = new \Nemundo\Model\Type\Text\TextType($this);
$this->emailOld->tableName = "marketingprogramm_kontakt_log";
$this->emailOld->externalTableName = "marketingprogramm_kontakt_log";
$this->emailOld->fieldName = "email_old";
$this->emailOld->aliasFieldName = "marketingprogramm_kontakt_log_email_old";
$this->emailOld->label = "Email Old";
$this->emailOld->allowNullValue = true;
$this->emailOld->length = 255;

$this->emailNew = new \Nemundo\Model\Type\Text\TextType($this);
$this->emailNew->tableName = "marketingprogramm_kontakt_log";
$this->emailNew->externalTableName = "marketingprogramm_kontakt_log";
$this->emailNew->fieldName = "email_new";
$this->emailNew->aliasFieldName = "marketingprogramm_kontakt_log_email_new";
$this->emailNew->label = "Email New";
$this->emailNew->allowNullValue = true;
$this->emailNew->length = 255;

$this->telefonHasChanged = new \Nemundo\Model\Type\Number\YesNoType($this);
$this->telefonHasChanged->tableName = "marketingprogramm_kontakt_log";
$this->telefonHasChanged->externalTableName = "marketingprogramm_kontakt_log";
$this->telefonHasChanged->fieldName = "telefon_has_changed";
$this->telefonHasChanged->aliasFieldName = "marketingprogramm_kontakt_log_telefon_has_changed";
$this->telefonHasChanged->label = "Telefon Has Changed";
$this->telefonHasChanged->allowNullValue = false;

$this->telefonOld = new \Nemundo\Model\Type\Text\TextType($this);
$this->telefonOld->tableName = "marketingprogramm_kontakt_log";
$this->telefonOld->externalTableName = "marketingprogramm_kontakt_log";
$this->telefonOld->fieldName = "telefon_old";
$this->telefonOld->aliasFieldName = "marketingprogramm_kontakt_log_telefon_old";
$this->telefonOld->label = "Telefon Old";
$this->telefonOld->allowNullValue = true;
$this->telefonOld->length = 255;

$this->telefonNew = new \Nemundo\Model\Type\Text\TextType($this);
$this->telefonNew->tableName = "marketingprogramm_kontakt_log";
$this->telefonNew->externalTableName = "marketingprogramm_kontakt_log";
$this->telefonNew->fieldName = "telefon_new";
$this->telefonNew->aliasFieldName = "marketingprogramm_kontakt_log_telefon_new";
$this->telefonNew->label = "Telefon New";
$this->telefonNew->allowNullValue = true;
$this->telefonNew->length = 255;

$index = new \Nemundo\Model\Definition\Index\ModelIndex($this);
$index->indexName = "kontakt";
$index->addType($this->kontaktId);

}
public function loadKontakt() {
if ($this->kontakt == null) {
$this->kontakt = new \LuzernTourismus\MarketingProgramm\Data\Kontakt\KontaktExternalType($this, "marketingprogramm_kontakt_log_kontakt");
$this->kontakt->tableName = "marketingprogramm_kontakt_log";
$this->kontakt->fieldName = "kontakt";
$this->kontakt->aliasFieldName = "marketingprogramm_kontakt_log_kontakt";
$this->kontakt->label = "Kontakt";
}
return $this;
}
public function loadLog() {
if ($this->log == null) {
$this->log = new \LuzernTourismus\MarketingProgramm\Data\ChangeLog\ChangeLogExternalType($this, "marketingprogramm_kontakt_log_log");
$this->log->tableName = "marketingprogramm_kontakt_log";
$this->log->fieldName = "log";
$this->log->aliasFieldName = "marketingprogramm_kontakt_log_log";
$this->log->label = "Log";
}
return $this;
}
}