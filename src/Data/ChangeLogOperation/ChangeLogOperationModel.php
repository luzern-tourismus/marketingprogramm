<?php
namespace LuzernTourismus\MarketingProgramm\Data\ChangeLogOperation;
class ChangeLogOperationModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $operation;

protected function loadModel() {
$this->tableName = "marketingprogramm_change_log_operation";
$this->aliasTableName = "marketingprogramm_change_log_operation";
$this->label = "Change Log Operation";

$this->primaryIndex = new \Nemundo\Db\Index\NumberIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "marketingprogramm_change_log_operation";
$this->id->externalTableName = "marketingprogramm_change_log_operation";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "marketingprogramm_change_log_operation_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->operation = new \Nemundo\Model\Type\Text\TextType($this);
$this->operation->tableName = "marketingprogramm_change_log_operation";
$this->operation->externalTableName = "marketingprogramm_change_log_operation";
$this->operation->fieldName = "operation";
$this->operation->aliasFieldName = "marketingprogramm_change_log_operation_operation";
$this->operation->label = "Operation";
$this->operation->allowNullValue = false;
$this->operation->length = 255;

}
}