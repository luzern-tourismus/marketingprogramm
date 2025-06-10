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

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $strasse;

/**
* @var \Nemundo\Model\Type\Number\NumberType
*/
public $plz;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $ort;

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

$this->strasse = new \Nemundo\Model\Type\Text\TextType();
$this->strasse->fieldName = "strasse";
$this->strasse->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->strasse->externalTableName = $this->externalTableName;
$this->strasse->aliasFieldName = $this->strasse->tableName . "_" . $this->strasse->fieldName;
$this->strasse->label = "Strasse";
$this->addType($this->strasse);

$this->plz = new \Nemundo\Model\Type\Number\NumberType();
$this->plz->fieldName = "plz";
$this->plz->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->plz->externalTableName = $this->externalTableName;
$this->plz->aliasFieldName = $this->plz->tableName . "_" . $this->plz->fieldName;
$this->plz->label = "PLZ";
$this->addType($this->plz);

$this->ort = new \Nemundo\Model\Type\Text\TextType();
$this->ort->fieldName = "ort";
$this->ort->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->ort->externalTableName = $this->externalTableName;
$this->ort->aliasFieldName = $this->ort->tableName . "_" . $this->ort->fieldName;
$this->ort->label = "Ort";
$this->addType($this->ort);

}
}