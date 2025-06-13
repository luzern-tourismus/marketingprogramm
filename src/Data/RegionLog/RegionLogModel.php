<?php
namespace LuzernTourismus\MarketingProgramm\Data\RegionLog;
class RegionLogModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\External\Id\NumberExternalIdType
*/
public $logId;

/**
* @var \LuzernTourismus\MarketingProgramm\Data\ChangeLog\ChangeLogExternalType
*/
public $log;

/**
* @var \Nemundo\Model\Type\External\Id\NumberExternalIdType
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

protected function loadModel() {
$this->tableName = "marketingprogramm_region_log";
$this->aliasTableName = "marketingprogramm_region_log";
$this->label = "Region Log";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "marketingprogramm_region_log";
$this->id->externalTableName = "marketingprogramm_region_log";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "marketingprogramm_region_log_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->logId = new \Nemundo\Model\Type\External\Id\NumberExternalIdType($this);
$this->logId->tableName = "marketingprogramm_region_log";
$this->logId->fieldName = "log";
$this->logId->aliasFieldName = "marketingprogramm_region_log_log";
$this->logId->label = "Log";
$this->logId->allowNullValue = false;

$this->regionId = new \Nemundo\Model\Type\External\Id\NumberExternalIdType($this);
$this->regionId->tableName = "marketingprogramm_region_log";
$this->regionId->fieldName = "region";
$this->regionId->aliasFieldName = "marketingprogramm_region_log_region";
$this->regionId->label = "Region";
$this->regionId->allowNullValue = false;

$this->regionHasChanged = new \Nemundo\Model\Type\Number\YesNoType($this);
$this->regionHasChanged->tableName = "marketingprogramm_region_log";
$this->regionHasChanged->externalTableName = "marketingprogramm_region_log";
$this->regionHasChanged->fieldName = "region_has_changed";
$this->regionHasChanged->aliasFieldName = "marketingprogramm_region_log_region_has_changed";
$this->regionHasChanged->label = "Region Has Changed";
$this->regionHasChanged->allowNullValue = false;

$this->regionOld = new \Nemundo\Model\Type\Text\TextType($this);
$this->regionOld->tableName = "marketingprogramm_region_log";
$this->regionOld->externalTableName = "marketingprogramm_region_log";
$this->regionOld->fieldName = "region_old";
$this->regionOld->aliasFieldName = "marketingprogramm_region_log_region_old";
$this->regionOld->label = "Region Old";
$this->regionOld->allowNullValue = true;
$this->regionOld->length = 255;

$this->regionNew = new \Nemundo\Model\Type\Text\TextType($this);
$this->regionNew->tableName = "marketingprogramm_region_log";
$this->regionNew->externalTableName = "marketingprogramm_region_log";
$this->regionNew->fieldName = "region_new";
$this->regionNew->aliasFieldName = "marketingprogramm_region_log_region_new";
$this->regionNew->label = "Region New";
$this->regionNew->allowNullValue = true;
$this->regionNew->length = 255;

}
public function loadLog() {
if ($this->log == null) {
$this->log = new \LuzernTourismus\MarketingProgramm\Data\ChangeLog\ChangeLogExternalType($this, "marketingprogramm_region_log_log");
$this->log->tableName = "marketingprogramm_region_log";
$this->log->fieldName = "log";
$this->log->aliasFieldName = "marketingprogramm_region_log_log";
$this->log->label = "Log";
}
return $this;
}
public function loadRegion() {
if ($this->region == null) {
$this->region = new \LuzernTourismus\MarketingProgramm\Data\Region\RegionExternalType($this, "marketingprogramm_region_log_region");
$this->region->tableName = "marketingprogramm_region_log";
$this->region->fieldName = "region";
$this->region->aliasFieldName = "marketingprogramm_region_log_region";
$this->region->label = "Region";
}
return $this;
}
}