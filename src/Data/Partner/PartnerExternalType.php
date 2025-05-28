<?php
namespace LuzernTourismus\MarketingProgramm\Data\Partner;
class PartnerExternalType extends \Nemundo\Model\Type\External\ExternalType {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $firma;

/**
* @var \Nemundo\Model\Type\Number\YesNoType
*/
public $isDeleted;

protected function loadExternalType() {
parent::loadExternalType();
$this->externalModelClassName = PartnerModel::class;
$this->externalTableName = "marketingprogramm_partner";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->externalTableName = $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->firma = new \Nemundo\Model\Type\Text\TextType();
$this->firma->fieldName = "firma";
$this->firma->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->firma->externalTableName = $this->externalTableName;
$this->firma->aliasFieldName = $this->firma->tableName . "_" . $this->firma->fieldName;
$this->firma->label = "Firma";
$this->addType($this->firma);

$this->isDeleted = new \Nemundo\Model\Type\Number\YesNoType();
$this->isDeleted->fieldName = "is_deleted";
$this->isDeleted->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->isDeleted->externalTableName = $this->externalTableName;
$this->isDeleted->aliasFieldName = $this->isDeleted->tableName . "_" . $this->isDeleted->fieldName;
$this->isDeleted->label = "Is Deleted";
$this->addType($this->isDeleted);

}
}