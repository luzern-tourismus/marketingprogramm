<?php
namespace LuzernTourismus\MarketingProgramm\Data\Kontakt;
class KontaktModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $name;

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

protected function loadModel() {
$this->tableName = "marketingprogramm_kontakt";
$this->aliasTableName = "marketingprogramm_kontakt";
$this->label = "Kontakt";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "marketingprogramm_kontakt";
$this->id->externalTableName = "marketingprogramm_kontakt";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "marketingprogramm_kontakt_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->name = new \Nemundo\Model\Type\Text\TextType($this);
$this->name->tableName = "marketingprogramm_kontakt";
$this->name->externalTableName = "marketingprogramm_kontakt";
$this->name->fieldName = "name";
$this->name->aliasFieldName = "marketingprogramm_kontakt_name";
$this->name->label = "Name";
$this->name->allowNullValue = false;
$this->name->length = 255;

$this->vorname = new \Nemundo\Model\Type\Text\TextType($this);
$this->vorname->tableName = "marketingprogramm_kontakt";
$this->vorname->externalTableName = "marketingprogramm_kontakt";
$this->vorname->fieldName = "vorname";
$this->vorname->aliasFieldName = "marketingprogramm_kontakt_vorname";
$this->vorname->label = "Vorname";
$this->vorname->allowNullValue = false;
$this->vorname->length = 255;

$this->email = new \Nemundo\Model\Type\Text\TextType($this);
$this->email->tableName = "marketingprogramm_kontakt";
$this->email->externalTableName = "marketingprogramm_kontakt";
$this->email->fieldName = "email";
$this->email->aliasFieldName = "marketingprogramm_kontakt_email";
$this->email->label = "Email";
$this->email->allowNullValue = false;
$this->email->length = 255;

$this->telefon = new \Nemundo\Model\Type\Text\TextType($this);
$this->telefon->tableName = "marketingprogramm_kontakt";
$this->telefon->externalTableName = "marketingprogramm_kontakt";
$this->telefon->fieldName = "telefon";
$this->telefon->aliasFieldName = "marketingprogramm_kontakt_telefon";
$this->telefon->label = "Telefon";
$this->telefon->allowNullValue = false;
$this->telefon->length = 255;

$this->isDeleted = new \Nemundo\Model\Type\Number\YesNoType($this);
$this->isDeleted->tableName = "marketingprogramm_kontakt";
$this->isDeleted->externalTableName = "marketingprogramm_kontakt";
$this->isDeleted->fieldName = "is_deleted";
$this->isDeleted->aliasFieldName = "marketingprogramm_kontakt_is_deleted";
$this->isDeleted->label = "Is Deleted";
$this->isDeleted->allowNullValue = false;

}
}