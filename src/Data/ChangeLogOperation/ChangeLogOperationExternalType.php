<?php
namespace LuzernTourismus\MarketingProgramm\Data\ChangeLogOperation;
class ChangeLogOperationExternalType extends \Nemundo\Model\Type\External\ExternalType {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $operation;

protected function loadExternalType() {
parent::loadExternalType();
$this->externalModelClassName = ChangeLogOperationModel::class;
$this->externalTableName = "marketingprogramm_change_log_operation";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->externalTableName = $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->operation = new \Nemundo\Model\Type\Text\TextType();
$this->operation->fieldName = "operation";
$this->operation->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->operation->externalTableName = $this->externalTableName;
$this->operation->aliasFieldName = $this->operation->tableName . "_" . $this->operation->fieldName;
$this->operation->label = "Operation";
$this->addType($this->operation);

}
}