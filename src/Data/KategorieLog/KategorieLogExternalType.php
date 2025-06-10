<?php
namespace LuzernTourismus\MarketingProgramm\Data\KategorieLog;
class KategorieLogExternalType extends \Nemundo\Model\Type\External\ExternalType {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

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
public $kategorieHasChanged;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $kategorieOld;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $kategorieNew;

/**
* @var \Nemundo\Model\Type\Number\YesNoType
*/
public $themaHasChanged;

/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $themaOldId;

/**
* @var \LuzernTourismus\MarketingProgramm\Data\Thema\ThemaExternalType
*/
public $themaOld;

/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $themaNewId;

/**
* @var \LuzernTourismus\MarketingProgramm\Data\Thema\ThemaExternalType
*/
public $themaNew;

/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $kategorieId;

/**
* @var \LuzernTourismus\MarketingProgramm\Data\Kategorie\KategorieExternalType
*/
public $kategorie;

protected function loadExternalType() {
parent::loadExternalType();
$this->externalModelClassName = KategorieLogModel::class;
$this->externalTableName = "marketingprogramm_kategorie_log";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->externalTableName = $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->logId = new \Nemundo\Model\Type\Id\IdType();
$this->logId->fieldName = "log";
$this->logId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->logId->aliasFieldName = $this->logId->tableName ."_".$this->logId->fieldName;
$this->logId->label = "Log";
$this->addType($this->logId);

$this->kategorieHasChanged = new \Nemundo\Model\Type\Number\YesNoType();
$this->kategorieHasChanged->fieldName = "kategorie_has_changed";
$this->kategorieHasChanged->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->kategorieHasChanged->externalTableName = $this->externalTableName;
$this->kategorieHasChanged->aliasFieldName = $this->kategorieHasChanged->tableName . "_" . $this->kategorieHasChanged->fieldName;
$this->kategorieHasChanged->label = "Kategorie Has Changed";
$this->addType($this->kategorieHasChanged);

$this->kategorieOld = new \Nemundo\Model\Type\Text\TextType();
$this->kategorieOld->fieldName = "kategorie_old";
$this->kategorieOld->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->kategorieOld->externalTableName = $this->externalTableName;
$this->kategorieOld->aliasFieldName = $this->kategorieOld->tableName . "_" . $this->kategorieOld->fieldName;
$this->kategorieOld->label = "Kategorie Old";
$this->addType($this->kategorieOld);

$this->kategorieNew = new \Nemundo\Model\Type\Text\TextType();
$this->kategorieNew->fieldName = "kategorie_new";
$this->kategorieNew->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->kategorieNew->externalTableName = $this->externalTableName;
$this->kategorieNew->aliasFieldName = $this->kategorieNew->tableName . "_" . $this->kategorieNew->fieldName;
$this->kategorieNew->label = "Kategorie New";
$this->addType($this->kategorieNew);

$this->themaHasChanged = new \Nemundo\Model\Type\Number\YesNoType();
$this->themaHasChanged->fieldName = "thema_has_changed";
$this->themaHasChanged->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->themaHasChanged->externalTableName = $this->externalTableName;
$this->themaHasChanged->aliasFieldName = $this->themaHasChanged->tableName . "_" . $this->themaHasChanged->fieldName;
$this->themaHasChanged->label = "Thema Has Changed";
$this->addType($this->themaHasChanged);

$this->themaOldId = new \Nemundo\Model\Type\Id\IdType();
$this->themaOldId->fieldName = "thema_old";
$this->themaOldId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->themaOldId->aliasFieldName = $this->themaOldId->tableName ."_".$this->themaOldId->fieldName;
$this->themaOldId->label = "Thema Old";
$this->addType($this->themaOldId);

$this->themaNewId = new \Nemundo\Model\Type\Id\IdType();
$this->themaNewId->fieldName = "thema_new";
$this->themaNewId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->themaNewId->aliasFieldName = $this->themaNewId->tableName ."_".$this->themaNewId->fieldName;
$this->themaNewId->label = "Thema New";
$this->addType($this->themaNewId);

$this->kategorieId = new \Nemundo\Model\Type\Id\IdType();
$this->kategorieId->fieldName = "kategorie";
$this->kategorieId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->kategorieId->aliasFieldName = $this->kategorieId->tableName ."_".$this->kategorieId->fieldName;
$this->kategorieId->label = "Kategorie";
$this->addType($this->kategorieId);

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
public function loadThemaOld() {
if ($this->themaOld == null) {
$this->themaOld = new \LuzernTourismus\MarketingProgramm\Data\Thema\ThemaExternalType(null, $this->parentFieldName . "_thema_old");
$this->themaOld->fieldName = "thema_old";
$this->themaOld->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->themaOld->aliasFieldName = $this->themaOld->tableName ."_".$this->themaOld->fieldName;
$this->themaOld->label = "Thema Old";
$this->addType($this->themaOld);
}
return $this;
}
public function loadThemaNew() {
if ($this->themaNew == null) {
$this->themaNew = new \LuzernTourismus\MarketingProgramm\Data\Thema\ThemaExternalType(null, $this->parentFieldName . "_thema_new");
$this->themaNew->fieldName = "thema_new";
$this->themaNew->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->themaNew->aliasFieldName = $this->themaNew->tableName ."_".$this->themaNew->fieldName;
$this->themaNew->label = "Thema New";
$this->addType($this->themaNew);
}
return $this;
}
public function loadKategorie() {
if ($this->kategorie == null) {
$this->kategorie = new \LuzernTourismus\MarketingProgramm\Data\Kategorie\KategorieExternalType(null, $this->parentFieldName . "_kategorie");
$this->kategorie->fieldName = "kategorie";
$this->kategorie->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->kategorie->aliasFieldName = $this->kategorie->tableName ."_".$this->kategorie->fieldName;
$this->kategorie->label = "Kategorie";
$this->addType($this->kategorie);
}
return $this;
}
}