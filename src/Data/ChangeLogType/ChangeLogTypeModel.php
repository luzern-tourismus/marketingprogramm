<?php
namespace LuzernTourismus\MarketingProgramm\Data\ChangeLogType;
class ChangeLogTypeModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $changeLogType;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $phpClass;

protected function loadModel() {
$this->tableName = "marketingprogramm_change_log_type";
$this->aliasTableName = "marketingprogramm_change_log_type";
$this->label = "Change Log Type";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "marketingprogramm_change_log_type";
$this->id->externalTableName = "marketingprogramm_change_log_type";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "marketingprogramm_change_log_type_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->changeLogType = new \Nemundo\Model\Type\Text\TextType($this);
$this->changeLogType->tableName = "marketingprogramm_change_log_type";
$this->changeLogType->externalTableName = "marketingprogramm_change_log_type";
$this->changeLogType->fieldName = "change_log_type";
$this->changeLogType->aliasFieldName = "marketingprogramm_change_log_type_change_log_type";
$this->changeLogType->label = "Change Log Type";
$this->changeLogType->allowNullValue = false;
$this->changeLogType->length = 255;

$this->phpClass = new \Nemundo\Model\Type\Text\TextType($this);
$this->phpClass->tableName = "marketingprogramm_change_log_type";
$this->phpClass->externalTableName = "marketingprogramm_change_log_type";
$this->phpClass->fieldName = "php_class";
$this->phpClass->aliasFieldName = "marketingprogramm_change_log_type_php_class";
$this->phpClass->label = "Php Class";
$this->phpClass->allowNullValue = false;
$this->phpClass->length = 255;

$index = new \Nemundo\Model\Definition\Index\ModelUniqueIndex($this);
$index->indexName = "php_class";
$index->addType($this->phpClass);

}
}