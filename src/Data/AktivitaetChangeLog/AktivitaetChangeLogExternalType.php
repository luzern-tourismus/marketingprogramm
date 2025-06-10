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
* @var \Nemundo\Model\Type\Id\IdType
*/
public $logId;

/**
* @var \LuzernTourismus\MarketingProgramm\Data\ChangeLog\ChangeLogExternalType
*/
public $log;

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

$this->datumHasChanged = new \Nemundo\Model\Type\Number\YesNoType();
$this->datumHasChanged->fieldName = "datum_has_changed";
$this->datumHasChanged->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->datumHasChanged->externalTableName = $this->externalTableName;
$this->datumHasChanged->aliasFieldName = $this->datumHasChanged->tableName . "_" . $this->datumHasChanged->fieldName;
$this->datumHasChanged->label = "Datum Has Changed";
$this->addType($this->datumHasChanged);

$this->datumOld = new \Nemundo\Model\Type\Text\TextType();
$this->datumOld->fieldName = "datum_old";
$this->datumOld->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->datumOld->externalTableName = $this->externalTableName;
$this->datumOld->aliasFieldName = $this->datumOld->tableName . "_" . $this->datumOld->fieldName;
$this->datumOld->label = "Datum Old";
$this->addType($this->datumOld);

$this->datumNew = new \Nemundo\Model\Type\Text\TextType();
$this->datumNew->fieldName = "datum_new";
$this->datumNew->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->datumNew->externalTableName = $this->externalTableName;
$this->datumNew->aliasFieldName = $this->datumNew->tableName . "_" . $this->datumNew->fieldName;
$this->datumNew->label = "Datum New";
$this->addType($this->datumNew);

$this->logId = new \Nemundo\Model\Type\Id\IdType();
$this->logId->fieldName = "log";
$this->logId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->logId->aliasFieldName = $this->logId->tableName ."_".$this->logId->fieldName;
$this->logId->label = "Log";
$this->addType($this->logId);

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