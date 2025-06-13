<?php
namespace LuzernTourismus\MarketingProgramm\Data\Kategorie;
class KategorieModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $kategorie;

/**
* @var \Nemundo\Model\Type\External\Id\NumberExternalIdType
*/
public $themaId;

/**
* @var \LuzernTourismus\MarketingProgramm\Data\Thema\ThemaExternalType
*/
public $thema;

/**
* @var \Nemundo\Model\Type\Number\YesNoType
*/
public $isDeleted;

/**
* @var \Nemundo\Model\Type\External\Id\NumberExternalIdType
*/
public $regionId;

/**
* @var \LuzernTourismus\MarketingProgramm\Data\Region\RegionExternalType
*/
public $region;

protected function loadModel() {
$this->tableName = "marketingprogramm_kategorie";
$this->aliasTableName = "marketingprogramm_kategorie";
$this->label = "Kategorie";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "marketingprogramm_kategorie";
$this->id->externalTableName = "marketingprogramm_kategorie";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "marketingprogramm_kategorie_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->kategorie = new \Nemundo\Model\Type\Text\TextType($this);
$this->kategorie->tableName = "marketingprogramm_kategorie";
$this->kategorie->externalTableName = "marketingprogramm_kategorie";
$this->kategorie->fieldName = "kategorie";
$this->kategorie->aliasFieldName = "marketingprogramm_kategorie_kategorie";
$this->kategorie->label = "Kategorie";
$this->kategorie->allowNullValue = false;
$this->kategorie->length = 255;

$this->themaId = new \Nemundo\Model\Type\External\Id\NumberExternalIdType($this);
$this->themaId->tableName = "marketingprogramm_kategorie";
$this->themaId->fieldName = "thema";
$this->themaId->aliasFieldName = "marketingprogramm_kategorie_thema";
$this->themaId->label = "Thema";
$this->themaId->allowNullValue = false;

$this->isDeleted = new \Nemundo\Model\Type\Number\YesNoType($this);
$this->isDeleted->tableName = "marketingprogramm_kategorie";
$this->isDeleted->externalTableName = "marketingprogramm_kategorie";
$this->isDeleted->fieldName = "is_deleted";
$this->isDeleted->aliasFieldName = "marketingprogramm_kategorie_is_deleted";
$this->isDeleted->label = "Is Deleted";
$this->isDeleted->allowNullValue = false;

$this->regionId = new \Nemundo\Model\Type\External\Id\NumberExternalIdType($this);
$this->regionId->tableName = "marketingprogramm_kategorie";
$this->regionId->fieldName = "region";
$this->regionId->aliasFieldName = "marketingprogramm_kategorie_region";
$this->regionId->label = "Region";
$this->regionId->allowNullValue = true;

}
public function loadThema() {
if ($this->thema == null) {
$this->thema = new \LuzernTourismus\MarketingProgramm\Data\Thema\ThemaExternalType($this, "marketingprogramm_kategorie_thema");
$this->thema->tableName = "marketingprogramm_kategorie";
$this->thema->fieldName = "thema";
$this->thema->aliasFieldName = "marketingprogramm_kategorie_thema";
$this->thema->label = "Thema";
}
return $this;
}
public function loadRegion() {
if ($this->region == null) {
$this->region = new \LuzernTourismus\MarketingProgramm\Data\Region\RegionExternalType($this, "marketingprogramm_kategorie_region");
$this->region->tableName = "marketingprogramm_kategorie";
$this->region->fieldName = "region";
$this->region->aliasFieldName = "marketingprogramm_kategorie_region";
$this->region->label = "Region";
}
return $this;
}
}