<?php
namespace LuzernTourismus\MarketingProgramm\Data\Anrede;
class AnredeExternalType extends \Nemundo\Model\Type\External\ExternalType {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $anrede;

protected function loadExternalType() {
parent::loadExternalType();
$this->externalModelClassName = AnredeModel::class;
$this->externalTableName = "marketingprogramm_anrede";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->externalTableName = $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->anrede = new \Nemundo\Model\Type\Text\TextType();
$this->anrede->fieldName = "anrede";
$this->anrede->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->anrede->externalTableName = $this->externalTableName;
$this->anrede->aliasFieldName = $this->anrede->tableName . "_" . $this->anrede->fieldName;
$this->anrede->label = "Anrede";
$this->addType($this->anrede);

}
}