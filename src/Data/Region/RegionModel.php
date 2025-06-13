<?php
namespace LuzernTourismus\MarketingProgramm\Data\Region;
class RegionModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $region;

/**
* @var \Nemundo\Model\Type\Number\YesNoType
*/
public $isDeleted;

protected function loadModel() {
$this->tableName = "marketingprogramm_region";
$this->aliasTableName = "marketingprogramm_region";
$this->label = "Region";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "marketingprogramm_region";
$this->id->externalTableName = "marketingprogramm_region";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "marketingprogramm_region_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->region = new \Nemundo\Model\Type\Text\TextType($this);
$this->region->tableName = "marketingprogramm_region";
$this->region->externalTableName = "marketingprogramm_region";
$this->region->fieldName = "region";
$this->region->aliasFieldName = "marketingprogramm_region_region";
$this->region->label = "Region";
$this->region->allowNullValue = false;
$this->region->length = 255;

$this->isDeleted = new \Nemundo\Model\Type\Number\YesNoType($this);
$this->isDeleted->tableName = "marketingprogramm_region";
$this->isDeleted->externalTableName = "marketingprogramm_region";
$this->isDeleted->fieldName = "is_deleted";
$this->isDeleted->aliasFieldName = "marketingprogramm_region_is_deleted";
$this->isDeleted->label = "Is Deleted";
$this->isDeleted->allowNullValue = false;

}
}