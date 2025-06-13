<?php
namespace LuzernTourismus\MarketingProgramm\Data\KategorieLog;
class KategorieLogModel extends \Nemundo\Model\Definition\Model\AbstractModel {
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
* @var \Nemundo\Model\Type\External\Id\NumberExternalIdType
*/
public $themaOldId;

/**
* @var \LuzernTourismus\MarketingProgramm\Data\Thema\ThemaExternalType
*/
public $themaOld;

/**
* @var \Nemundo\Model\Type\External\Id\NumberExternalIdType
*/
public $themaNewId;

/**
* @var \LuzernTourismus\MarketingProgramm\Data\Thema\ThemaExternalType
*/
public $themaNew;

/**
* @var \Nemundo\Model\Type\External\Id\NumberExternalIdType
*/
public $kategorieId;

/**
* @var \LuzernTourismus\MarketingProgramm\Data\Kategorie\KategorieExternalType
*/
public $kategorie;

/**
* @var \Nemundo\Model\Type\Number\YesNoType
*/
public $regionHasChanged;

/**
* @var \Nemundo\Model\Type\External\Id\NumberExternalIdType
*/
public $regionOldId;

/**
* @var \LuzernTourismus\MarketingProgramm\Data\Region\RegionExternalType
*/
public $regionOld;

/**
* @var \Nemundo\Model\Type\External\Id\NumberExternalIdType
*/
public $regionNewId;

/**
* @var \LuzernTourismus\MarketingProgramm\Data\Region\RegionExternalType
*/
public $regionNew;

protected function loadModel() {
$this->tableName = "marketingprogramm_kategorie_log";
$this->aliasTableName = "marketingprogramm_kategorie_log";
$this->label = "Kategorie Log";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "marketingprogramm_kategorie_log";
$this->id->externalTableName = "marketingprogramm_kategorie_log";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "marketingprogramm_kategorie_log_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->logId = new \Nemundo\Model\Type\External\Id\NumberExternalIdType($this);
$this->logId->tableName = "marketingprogramm_kategorie_log";
$this->logId->fieldName = "log";
$this->logId->aliasFieldName = "marketingprogramm_kategorie_log_log";
$this->logId->label = "Log";
$this->logId->allowNullValue = false;

$this->kategorieHasChanged = new \Nemundo\Model\Type\Number\YesNoType($this);
$this->kategorieHasChanged->tableName = "marketingprogramm_kategorie_log";
$this->kategorieHasChanged->externalTableName = "marketingprogramm_kategorie_log";
$this->kategorieHasChanged->fieldName = "kategorie_has_changed";
$this->kategorieHasChanged->aliasFieldName = "marketingprogramm_kategorie_log_kategorie_has_changed";
$this->kategorieHasChanged->label = "Kategorie Has Changed";
$this->kategorieHasChanged->allowNullValue = false;

$this->kategorieOld = new \Nemundo\Model\Type\Text\TextType($this);
$this->kategorieOld->tableName = "marketingprogramm_kategorie_log";
$this->kategorieOld->externalTableName = "marketingprogramm_kategorie_log";
$this->kategorieOld->fieldName = "kategorie_old";
$this->kategorieOld->aliasFieldName = "marketingprogramm_kategorie_log_kategorie_old";
$this->kategorieOld->label = "Kategorie Old";
$this->kategorieOld->allowNullValue = true;
$this->kategorieOld->length = 255;

$this->kategorieNew = new \Nemundo\Model\Type\Text\TextType($this);
$this->kategorieNew->tableName = "marketingprogramm_kategorie_log";
$this->kategorieNew->externalTableName = "marketingprogramm_kategorie_log";
$this->kategorieNew->fieldName = "kategorie_new";
$this->kategorieNew->aliasFieldName = "marketingprogramm_kategorie_log_kategorie_new";
$this->kategorieNew->label = "Kategorie New";
$this->kategorieNew->allowNullValue = true;
$this->kategorieNew->length = 255;

$this->themaHasChanged = new \Nemundo\Model\Type\Number\YesNoType($this);
$this->themaHasChanged->tableName = "marketingprogramm_kategorie_log";
$this->themaHasChanged->externalTableName = "marketingprogramm_kategorie_log";
$this->themaHasChanged->fieldName = "thema_has_changed";
$this->themaHasChanged->aliasFieldName = "marketingprogramm_kategorie_log_thema_has_changed";
$this->themaHasChanged->label = "Thema Has Changed";
$this->themaHasChanged->allowNullValue = false;

$this->themaOldId = new \Nemundo\Model\Type\External\Id\NumberExternalIdType($this);
$this->themaOldId->tableName = "marketingprogramm_kategorie_log";
$this->themaOldId->fieldName = "thema_old";
$this->themaOldId->aliasFieldName = "marketingprogramm_kategorie_log_thema_old";
$this->themaOldId->label = "Thema Old";
$this->themaOldId->allowNullValue = true;

$this->themaNewId = new \Nemundo\Model\Type\External\Id\NumberExternalIdType($this);
$this->themaNewId->tableName = "marketingprogramm_kategorie_log";
$this->themaNewId->fieldName = "thema_new";
$this->themaNewId->aliasFieldName = "marketingprogramm_kategorie_log_thema_new";
$this->themaNewId->label = "Thema New";
$this->themaNewId->allowNullValue = true;

$this->kategorieId = new \Nemundo\Model\Type\External\Id\NumberExternalIdType($this);
$this->kategorieId->tableName = "marketingprogramm_kategorie_log";
$this->kategorieId->fieldName = "kategorie";
$this->kategorieId->aliasFieldName = "marketingprogramm_kategorie_log_kategorie";
$this->kategorieId->label = "Kategorie";
$this->kategorieId->allowNullValue = false;

$this->regionHasChanged = new \Nemundo\Model\Type\Number\YesNoType($this);
$this->regionHasChanged->tableName = "marketingprogramm_kategorie_log";
$this->regionHasChanged->externalTableName = "marketingprogramm_kategorie_log";
$this->regionHasChanged->fieldName = "region_has_changed";
$this->regionHasChanged->aliasFieldName = "marketingprogramm_kategorie_log_region_has_changed";
$this->regionHasChanged->label = "Region Has Changed";
$this->regionHasChanged->allowNullValue = false;

$this->regionOldId = new \Nemundo\Model\Type\External\Id\NumberExternalIdType($this);
$this->regionOldId->tableName = "marketingprogramm_kategorie_log";
$this->regionOldId->fieldName = "region_old";
$this->regionOldId->aliasFieldName = "marketingprogramm_kategorie_log_region_old";
$this->regionOldId->label = "Region Old";
$this->regionOldId->allowNullValue = true;

$this->regionNewId = new \Nemundo\Model\Type\External\Id\NumberExternalIdType($this);
$this->regionNewId->tableName = "marketingprogramm_kategorie_log";
$this->regionNewId->fieldName = "region_new";
$this->regionNewId->aliasFieldName = "marketingprogramm_kategorie_log_region_new";
$this->regionNewId->label = "Region New";
$this->regionNewId->allowNullValue = true;

$index = new \Nemundo\Model\Definition\Index\ModelIndex($this);
$index->indexName = "log";
$index->addType($this->logId);

}
public function loadLog() {
if ($this->log == null) {
$this->log = new \LuzernTourismus\MarketingProgramm\Data\ChangeLog\ChangeLogExternalType($this, "marketingprogramm_kategorie_log_log");
$this->log->tableName = "marketingprogramm_kategorie_log";
$this->log->fieldName = "log";
$this->log->aliasFieldName = "marketingprogramm_kategorie_log_log";
$this->log->label = "Log";
}
return $this;
}
public function loadThemaOld() {
if ($this->themaOld == null) {
$this->themaOld = new \LuzernTourismus\MarketingProgramm\Data\Thema\ThemaExternalType($this, "marketingprogramm_kategorie_log_thema_old");
$this->themaOld->tableName = "marketingprogramm_kategorie_log";
$this->themaOld->fieldName = "thema_old";
$this->themaOld->aliasFieldName = "marketingprogramm_kategorie_log_thema_old";
$this->themaOld->label = "Thema Old";
}
return $this;
}
public function loadThemaNew() {
if ($this->themaNew == null) {
$this->themaNew = new \LuzernTourismus\MarketingProgramm\Data\Thema\ThemaExternalType($this, "marketingprogramm_kategorie_log_thema_new");
$this->themaNew->tableName = "marketingprogramm_kategorie_log";
$this->themaNew->fieldName = "thema_new";
$this->themaNew->aliasFieldName = "marketingprogramm_kategorie_log_thema_new";
$this->themaNew->label = "Thema New";
}
return $this;
}
public function loadKategorie() {
if ($this->kategorie == null) {
$this->kategorie = new \LuzernTourismus\MarketingProgramm\Data\Kategorie\KategorieExternalType($this, "marketingprogramm_kategorie_log_kategorie");
$this->kategorie->tableName = "marketingprogramm_kategorie_log";
$this->kategorie->fieldName = "kategorie";
$this->kategorie->aliasFieldName = "marketingprogramm_kategorie_log_kategorie";
$this->kategorie->label = "Kategorie";
}
return $this;
}
public function loadRegionOld() {
if ($this->regionOld == null) {
$this->regionOld = new \LuzernTourismus\MarketingProgramm\Data\Region\RegionExternalType($this, "marketingprogramm_kategorie_log_region_old");
$this->regionOld->tableName = "marketingprogramm_kategorie_log";
$this->regionOld->fieldName = "region_old";
$this->regionOld->aliasFieldName = "marketingprogramm_kategorie_log_region_old";
$this->regionOld->label = "Region Old";
}
return $this;
}
public function loadRegionNew() {
if ($this->regionNew == null) {
$this->regionNew = new \LuzernTourismus\MarketingProgramm\Data\Region\RegionExternalType($this, "marketingprogramm_kategorie_log_region_new");
$this->regionNew->tableName = "marketingprogramm_kategorie_log";
$this->regionNew->fieldName = "region_new";
$this->regionNew->aliasFieldName = "marketingprogramm_kategorie_log_region_new";
$this->regionNew->label = "Region New";
}
return $this;
}
}