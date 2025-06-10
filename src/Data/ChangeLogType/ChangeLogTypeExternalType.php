<?php
namespace LuzernTourismus\MarketingProgramm\Data\ChangeLogType;
class ChangeLogTypeExternalType extends \Nemundo\Model\Type\External\ExternalType {
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

protected function loadExternalType() {
parent::loadExternalType();
$this->externalModelClassName = ChangeLogTypeModel::class;
$this->externalTableName = "marketingprogramm_change_log_type";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->externalTableName = $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->changeLogType = new \Nemundo\Model\Type\Text\TextType();
$this->changeLogType->fieldName = "change_log_type";
$this->changeLogType->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->changeLogType->externalTableName = $this->externalTableName;
$this->changeLogType->aliasFieldName = $this->changeLogType->tableName . "_" . $this->changeLogType->fieldName;
$this->changeLogType->label = "Change Log Type";
$this->addType($this->changeLogType);

$this->phpClass = new \Nemundo\Model\Type\Text\TextType();
$this->phpClass->fieldName = "php_class";
$this->phpClass->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->phpClass->externalTableName = $this->externalTableName;
$this->phpClass->aliasFieldName = $this->phpClass->tableName . "_" . $this->phpClass->fieldName;
$this->phpClass->label = "Php Class";
$this->addType($this->phpClass);

}
}