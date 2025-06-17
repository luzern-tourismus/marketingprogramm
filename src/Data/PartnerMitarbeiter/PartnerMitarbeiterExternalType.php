<?php
namespace LuzernTourismus\MarketingProgramm\Data\PartnerMitarbeiter;
class PartnerMitarbeiterExternalType extends \Nemundo\Model\Type\External\ExternalType {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $partnerId;

/**
* @var \LuzernTourismus\MarketingProgramm\Data\Partner\PartnerExternalType
*/
public $partner;

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
* @var \Nemundo\Model\Type\Number\YesNoType
*/
public $isDeleted;

/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $anredeId;

/**
* @var \LuzernTourismus\MarketingProgramm\Data\Anrede\AnredeExternalType
*/
public $anrede;

protected function loadExternalType() {
parent::loadExternalType();
$this->externalModelClassName = PartnerMitarbeiterModel::class;
$this->externalTableName = "marketingprogramm_partner_mitarbeiter";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->externalTableName = $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->partnerId = new \Nemundo\Model\Type\Id\IdType();
$this->partnerId->fieldName = "partner";
$this->partnerId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->partnerId->aliasFieldName = $this->partnerId->tableName ."_".$this->partnerId->fieldName;
$this->partnerId->label = "Partner";
$this->addType($this->partnerId);

$this->name = new \Nemundo\Model\Type\Text\TextType();
$this->name->fieldName = "name";
$this->name->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->name->externalTableName = $this->externalTableName;
$this->name->aliasFieldName = $this->name->tableName . "_" . $this->name->fieldName;
$this->name->label = "Name";
$this->addType($this->name);

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

$this->isDeleted = new \Nemundo\Model\Type\Number\YesNoType();
$this->isDeleted->fieldName = "is_deleted";
$this->isDeleted->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->isDeleted->externalTableName = $this->externalTableName;
$this->isDeleted->aliasFieldName = $this->isDeleted->tableName . "_" . $this->isDeleted->fieldName;
$this->isDeleted->label = "Is deleted";
$this->addType($this->isDeleted);

$this->anredeId = new \Nemundo\Model\Type\Id\IdType();
$this->anredeId->fieldName = "anrede";
$this->anredeId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->anredeId->aliasFieldName = $this->anredeId->tableName ."_".$this->anredeId->fieldName;
$this->anredeId->label = "Anrede";
$this->addType($this->anredeId);

}
public function loadPartner() {
if ($this->partner == null) {
$this->partner = new \LuzernTourismus\MarketingProgramm\Data\Partner\PartnerExternalType(null, $this->parentFieldName . "_partner");
$this->partner->fieldName = "partner";
$this->partner->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->partner->aliasFieldName = $this->partner->tableName ."_".$this->partner->fieldName;
$this->partner->label = "Partner";
$this->addType($this->partner);
}
return $this;
}
public function loadAnrede() {
if ($this->anrede == null) {
$this->anrede = new \LuzernTourismus\MarketingProgramm\Data\Anrede\AnredeExternalType(null, $this->parentFieldName . "_anrede");
$this->anrede->fieldName = "anrede";
$this->anrede->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->anrede->aliasFieldName = $this->anrede->tableName ."_".$this->anrede->fieldName;
$this->anrede->label = "Anrede";
$this->addType($this->anrede);
}
return $this;
}
}