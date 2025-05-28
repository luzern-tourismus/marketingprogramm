<?php
namespace LuzernTourismus\MarketingProgramm\Data\Thema;
class ThemaModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $thema;

protected function loadModel() {
$this->tableName = "marketingprogramm_thema";
$this->aliasTableName = "marketingprogramm_thema";
$this->label = "Thema";

$this->primaryIndex = new \Nemundo\Db\Index\NumberIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "marketingprogramm_thema";
$this->id->externalTableName = "marketingprogramm_thema";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "marketingprogramm_thema_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->thema = new \Nemundo\Model\Type\Text\TextType($this);
$this->thema->tableName = "marketingprogramm_thema";
$this->thema->externalTableName = "marketingprogramm_thema";
$this->thema->fieldName = "thema";
$this->thema->aliasFieldName = "marketingprogramm_thema_thema";
$this->thema->label = "Thema";
$this->thema->allowNullValue = false;
$this->thema->length = 255;

}
}