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

/**
* @var \Nemundo\Model\Type\Number\YesNoType
*/
public $datumHasChanged;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $datumOld;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $datumNew;

/**
* @var \Nemundo\Model\Type\External\Id\NumberExternalIdType
*/
public $logId;

/**
* @var \LuzernTourismus\MarketingProgramm\Data\ChangeLog\ChangeLogExternalType
*/
public $log;

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

$this->datumHasChanged = new \Nemundo\Model\Type\Number\YesNoType($this);
$this->datumHasChanged->tableName = "marketingprogramm_aktivitaet_change_log";
$this->datumHasChanged->externalTableName = "marketingprogramm_aktivitaet_change_log";
$this->datumHasChanged->fieldName = "datum_has_changed";
$this->datumHasChanged->aliasFieldName = "marketingprogramm_aktivitaet_change_log_datum_has_changed";
$this->datumHasChanged->label = "Datum Has Changed";
$this->datumHasChanged->allowNullValue = false;

$this->datumOld = new \Nemundo\Model\Type\Text\TextType($this);
$this->datumOld->tableName = "marketingprogramm_aktivitaet_change_log";
$this->datumOld->externalTableName = "marketingprogramm_aktivitaet_change_log";
$this->datumOld->fieldName = "datum_old";
$this->datumOld->aliasFieldName = "marketingprogramm_aktivitaet_change_log_datum_old";
$this->datumOld->label = "Datum Old";
$this->datumOld->allowNullValue = true;
$this->datumOld->length = 255;

$this->datumNew = new \Nemundo\Model\Type\Text\TextType($this);
$this->datumNew->tableName = "marketingprogramm_aktivitaet_change_log";
$this->datumNew->externalTableName = "marketingprogramm_aktivitaet_change_log";
$this->datumNew->fieldName = "datum_new";
$this->datumNew->aliasFieldName = "marketingprogramm_aktivitaet_change_log_datum_new";
$this->datumNew->label = "Datum New";
$this->datumNew->allowNullValue = true;
$this->datumNew->length = 255;

$this->logId = new \Nemundo\Model\Type\External\Id\NumberExternalIdType($this);
$this->logId->tableName = "marketingprogramm_aktivitaet_change_log";
$this->logId->fieldName = "log";
$this->logId->aliasFieldName = "marketingprogramm_aktivitaet_change_log_log";
$this->logId->label = "Log";
$this->logId->allowNullValue = false;

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
public function loadLog() {
if ($this->log == null) {
$this->log = new \LuzernTourismus\MarketingProgramm\Data\ChangeLog\ChangeLogExternalType($this, "marketingprogramm_aktivitaet_change_log_log");
$this->log->tableName = "marketingprogramm_aktivitaet_change_log";
$this->log->fieldName = "log";
$this->log->aliasFieldName = "marketingprogramm_aktivitaet_change_log_log";
$this->log->label = "Log";
}
return $this;
}
}