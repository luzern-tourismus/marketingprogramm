<?php
namespace LuzernTourismus\MarketingProgramm\Data\Thema;
class ThemaExternalType extends \Nemundo\Model\Type\External\ExternalType {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $thema;

protected function loadExternalType() {
parent::loadExternalType();
$this->externalModelClassName = ThemaModel::class;
$this->externalTableName = "marketingprogramm_thema";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->externalTableName = $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->thema = new \Nemundo\Model\Type\Text\TextType();
$this->thema->fieldName = "thema";
$this->thema->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->thema->externalTableName = $this->externalTableName;
$this->thema->aliasFieldName = $this->thema->tableName . "_" . $this->thema->fieldName;
$this->thema->label = "Thema";
$this->addType($this->thema);

}
}