<?php
namespace LuzernTourismus\MarketingProgramm\Data\RegionLog;
class RegionLogExternalType extends \Nemundo\Model\Type\External\ExternalType {
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
* @var \Nemundo\Model\Type\Id\IdType
*/
public $regionId;

/**
* @var \LuzernTourismus\MarketingProgramm\Data\Region\RegionExternalType
*/
public $region;

/**
* @var \Nemundo\Model\Type\Number\YesNoType
*/
public $regionHasChanged;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $regionOld;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $regionNew;

protected function loadExternalType() {
parent::loadExternalType();
$this->externalModelClassName = RegionLogModel::class;
$this->externalTableName = "marketingprogramm_region_log";
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

$this->regionId = new \Nemundo\Model\Type\Id\IdType();
$this->regionId->fieldName = "region";
$this->regionId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->regionId->aliasFieldName = $this->regionId->tableName ."_".$this->regionId->fieldName;
$this->regionId->label = "Region";
$this->addType($this->regionId);

$this->regionHasChanged = new \Nemundo\Model\Type\Number\YesNoType();
$this->regionHasChanged->fieldName = "region_has_changed";
$this->regionHasChanged->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->regionHasChanged->externalTableName = $this->externalTableName;
$this->regionHasChanged->aliasFieldName = $this->regionHasChanged->tableName . "_" . $this->regionHasChanged->fieldName;
$this->regionHasChanged->label = "Region Has Changed";
$this->addType($this->regionHasChanged);

$this->regionOld = new \Nemundo\Model\Type\Text\TextType();
$this->regionOld->fieldName = "region_old";
$this->regionOld->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->regionOld->externalTableName = $this->externalTableName;
$this->regionOld->aliasFieldName = $this->regionOld->tableName . "_" . $this->regionOld->fieldName;
$this->regionOld->label = "Region Old";
$this->addType($this->regionOld);

$this->regionNew = new \Nemundo\Model\Type\Text\TextType();
$this->regionNew->fieldName = "region_new";
$this->regionNew->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->regionNew->externalTableName = $this->externalTableName;
$this->regionNew->aliasFieldName = $this->regionNew->tableName . "_" . $this->regionNew->fieldName;
$this->regionNew->label = "Region New";
$this->addType($this->regionNew);

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
public function loadRegion() {
if ($this->region == null) {
$this->region = new \LuzernTourismus\MarketingProgramm\Data\Region\RegionExternalType(null, $this->parentFieldName . "_region");
$this->region->fieldName = "region";
$this->region->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->region->aliasFieldName = $this->region->tableName ."_".$this->region->fieldName;
$this->region->label = "Region";
$this->addType($this->region);
}
return $this;
}
}