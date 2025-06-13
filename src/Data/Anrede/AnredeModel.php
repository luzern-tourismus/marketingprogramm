<?php
namespace LuzernTourismus\MarketingProgramm\Data\Anrede;
class AnredeModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $anrede;

protected function loadModel() {
$this->tableName = "marketingprogramm_anrede";
$this->aliasTableName = "marketingprogramm_anrede";
$this->label = "Anrede";

$this->primaryIndex = new \Nemundo\Db\Index\NumberIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "marketingprogramm_anrede";
$this->id->externalTableName = "marketingprogramm_anrede";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "marketingprogramm_anrede_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->anrede = new \Nemundo\Model\Type\Text\TextType($this);
$this->anrede->tableName = "marketingprogramm_anrede";
$this->anrede->externalTableName = "marketingprogramm_anrede";
$this->anrede->fieldName = "anrede";
$this->anrede->aliasFieldName = "marketingprogramm_anrede_anrede";
$this->anrede->label = "Anrede";
$this->anrede->allowNullValue = false;
$this->anrede->length = 255;

}
}