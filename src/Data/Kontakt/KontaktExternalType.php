<?php
namespace LuzernTourismus\MarketingProgramm\Data\Kontakt;
class KontaktExternalType extends \Nemundo\Model\Type\External\ExternalType {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $nachname;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $vorname;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $email;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $telefon;

/**
* @var \Nemundo\Model\Type\Number\YesNoType
*/
public $isDeleted;

protected function loadExternalType() {
parent::loadExternalType();
$this->externalModelClassName = KontaktModel::class;
$this->externalTableName = "marketingprogramm_kontakt";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->externalTableName = $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->nachname = new \Nemundo\Model\Type\Text\TextType();
$this->nachname->fieldName = "nachname";
$this->nachname->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->nachname->externalTableName = $this->externalTableName;
$this->nachname->aliasFieldName = $this->nachname->tableName . "_" . $this->nachname->fieldName;
$this->nachname->label = "Name";
$this->addType($this->nachname);

$this->vorname = new \Nemundo\Model\Type\Text\TextType();
$this->vorname->fieldName = "vorname";
$this->vorname->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->vorname->externalTableName = $this->externalTableName;
$this->vorname->aliasFieldName = $this->vorname->tableName . "_" . $this->vorname->fieldName;
$this->vorname->label = "Vorname";
$this->addType($this->vorname);

$this->email = new \Nemundo\Model\Type\Text\TextType();
$this->email->fieldName = "email";
$this->email->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->email->externalTableName = $this->externalTableName;
$this->email->aliasFieldName = $this->email->tableName . "_" . $this->email->fieldName;
$this->email->label = "Email";
$this->addType($this->email);

$this->telefon = new \Nemundo\Model\Type\Text\TextType();
$this->telefon->fieldName = "telefon";
$this->telefon->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->telefon->externalTableName = $this->externalTableName;
$this->telefon->aliasFieldName = $this->telefon->tableName . "_" . $this->telefon->fieldName;
$this->telefon->label = "Telefon";
$this->addType($this->telefon);

$this->isDeleted = new \Nemundo\Model\Type\Number\YesNoType();
$this->isDeleted->fieldName = "is_deleted";
$this->isDeleted->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->isDeleted->externalTableName = $this->externalTableName;
$this->isDeleted->aliasFieldName = $this->isDeleted->tableName . "_" . $this->isDeleted->fieldName;
$this->isDeleted->label = "Is Deleted";
$this->addType($this->isDeleted);

}
}