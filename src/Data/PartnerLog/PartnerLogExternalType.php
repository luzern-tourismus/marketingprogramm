<?php
namespace LuzernTourismus\MarketingProgramm\Data\PartnerLog;
class PartnerLogExternalType extends \Nemundo\Model\Type\External\ExternalType {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $partnerId;

/**
* @var \LuzernTourismus\MarketingProgramm\Data\Partner\PartnerExternalType
*/
public $partner;

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
public $firmaHasChanged;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $firmaOld;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $firmaNew;

/**
* @var \Nemundo\Model\Type\Number\YesNoType
*/
public $strasseHasChanged;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $strasseOld;

protected function loadExternalType() {
parent::loadExternalType();
$this->externalModelClassName = PartnerLogModel::class;
$this->externalTableName = "marketingprogramm_partner_log";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->externalTableName = $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->partnerId = new \Nemundo\Model\Type\Id\IdType();
$this->partnerId->fieldName = "partner";
$this->partnerId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->partnerId->aliasFieldName = $this->partnerId->tableName ."_".$this->partnerId->fieldName;
$this->partnerId->label = "Partner";
$this->addType($this->partnerId);

$this->logId = new \Nemundo\Model\Type\Id\IdType();
$this->logId->fieldName = "log";
$this->logId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->logId->aliasFieldName = $this->logId->tableName ."_".$this->logId->fieldName;
$this->logId->label = "Log";
$this->addType($this->logId);

$this->firmaHasChanged = new \Nemundo\Model\Type\Number\YesNoType();
$this->firmaHasChanged->fieldName = "firma_has_changed";
$this->firmaHasChanged->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->firmaHasChanged->externalTableName = $this->externalTableName;
$this->firmaHasChanged->aliasFieldName = $this->firmaHasChanged->tableName . "_" . $this->firmaHasChanged->fieldName;
$this->firmaHasChanged->label = "Firma Has Changed";
$this->addType($this->firmaHasChanged);

$this->firmaOld = new \Nemundo\Model\Type\Text\TextType();
$this->firmaOld->fieldName = "firma_old";
$this->firmaOld->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->firmaOld->externalTableName = $this->externalTableName;
$this->firmaOld->aliasFieldName = $this->firmaOld->tableName . "_" . $this->firmaOld->fieldName;
$this->firmaOld->label = "Firma Old";
$this->addType($this->firmaOld);

$this->firmaNew = new \Nemundo\Model\Type\Text\TextType();
$this->firmaNew->fieldName = "firma_new";
$this->firmaNew->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->firmaNew->externalTableName = $this->externalTableName;
$this->firmaNew->aliasFieldName = $this->firmaNew->tableName . "_" . $this->firmaNew->fieldName;
$this->firmaNew->label = "Firma New";
$this->addType($this->firmaNew);

$this->strasseHasChanged = new \Nemundo\Model\Type\Number\YesNoType();
$this->strasseHasChanged->fieldName = "strasse_has_changed";
$this->strasseHasChanged->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->strasseHasChanged->externalTableName = $this->externalTableName;
$this->strasseHasChanged->aliasFieldName = $this->strasseHasChanged->tableName . "_" . $this->strasseHasChanged->fieldName;
$this->strasseHasChanged->label = "Strasse Has Changed";
$this->addType($this->strasseHasChanged);

$this->strasseOld = new \Nemundo\Model\Type\Text\TextType();
$this->strasseOld->fieldName = "strasse_old";
$this->strasseOld->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->strasseOld->externalTableName = $this->externalTableName;
$this->strasseOld->aliasFieldName = $this->strasseOld->tableName . "_" . $this->strasseOld->fieldName;
$this->strasseOld->label = "Strasse Old";
$this->addType($this->strasseOld);

}
public function loadPartner() {
if ($this->partner == null) {
$this->partner = new \LuzernTourismus\MarketingProgramm\Data\Partner\PartnerExternalType(null, $this->parentFieldName . "_partner");
$this->partner->fieldName = "partner";
$this->partner->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->partner->aliasFieldName = $this->partner->tableName ."_".$this->partner->fieldName;
$this->partner->label = "Partner";
$this->addType($this->partner);
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