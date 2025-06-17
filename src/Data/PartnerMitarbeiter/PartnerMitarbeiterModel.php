<?php
namespace LuzernTourismus\MarketingProgramm\Data\PartnerMitarbeiter;
class PartnerMitarbeiterModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\External\Id\NumberExternalIdType
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
* @var \Nemundo\Model\Type\External\Id\NumberExternalIdType
*/
public $anredeId;

/**
* @var \LuzernTourismus\MarketingProgramm\Data\Anrede\AnredeExternalType
*/
public $anrede;

protected function loadModel() {
$this->tableName = "marketingprogramm_partner_mitarbeiter";
$this->aliasTableName = "marketingprogramm_partner_mitarbeiter";
$this->label = "Partner Mitarbeiter";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "marketingprogramm_partner_mitarbeiter";
$this->id->externalTableName = "marketingprogramm_partner_mitarbeiter";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "marketingprogramm_partner_mitarbeiter_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->partnerId = new \Nemundo\Model\Type\External\Id\NumberExternalIdType($this);
$this->partnerId->tableName = "marketingprogramm_partner_mitarbeiter";
$this->partnerId->fieldName = "partner";
$this->partnerId->aliasFieldName = "marketingprogramm_partner_mitarbeiter_partner";
$this->partnerId->label = "Partner";
$this->partnerId->allowNullValue = false;

$this->name = new \Nemundo\Model\Type\Text\TextType($this);
$this->name->tableName = "marketingprogramm_partner_mitarbeiter";
$this->name->externalTableName = "marketingprogramm_partner_mitarbeiter";
$this->name->fieldName = "name";
$this->name->aliasFieldName = "marketingprogramm_partner_mitarbeiter_name";
$this->name->label = "Name";
$this->name->allowNullValue = true;
$this->name->length = 255;

$this->vorname = new \Nemundo\Model\Type\Text\TextType($this);
$this->vorname->tableName = "marketingprogramm_partner_mitarbeiter";
$this->vorname->externalTableName = "marketingprogramm_partner_mitarbeiter";
$this->vorname->fieldName = "vorname";
$this->vorname->aliasFieldName = "marketingprogramm_partner_mitarbeiter_vorname";
$this->vorname->label = "Vorname";
$this->vorname->allowNullValue = true;
$this->vorname->length = 255;

$this->email = new \Nemundo\Model\Type\Text\TextType($this);
$this->email->tableName = "marketingprogramm_partner_mitarbeiter";
$this->email->externalTableName = "marketingprogramm_partner_mitarbeiter";
$this->email->fieldName = "email";
$this->email->aliasFieldName = "marketingprogramm_partner_mitarbeiter_email";
$this->email->label = "Email";
$this->email->allowNullValue = false;
$this->email->length = 255;

$this->isDeleted = new \Nemundo\Model\Type\Number\YesNoType($this);
$this->isDeleted->tableName = "marketingprogramm_partner_mitarbeiter";
$this->isDeleted->externalTableName = "marketingprogramm_partner_mitarbeiter";
$this->isDeleted->fieldName = "is_deleted";
$this->isDeleted->aliasFieldName = "marketingprogramm_partner_mitarbeiter_is_deleted";
$this->isDeleted->label = "Is deleted";
$this->isDeleted->allowNullValue = false;

$this->anredeId = new \Nemundo\Model\Type\External\Id\NumberExternalIdType($this);
$this->anredeId->tableName = "marketingprogramm_partner_mitarbeiter";
$this->anredeId->fieldName = "anrede";
$this->anredeId->aliasFieldName = "marketingprogramm_partner_mitarbeiter_anrede";
$this->anredeId->label = "Anrede";
$this->anredeId->allowNullValue = true;

}
public function loadPartner() {
if ($this->partner == null) {
$this->partner = new \LuzernTourismus\MarketingProgramm\Data\Partner\PartnerExternalType($this, "marketingprogramm_partner_mitarbeiter_partner");
$this->partner->tableName = "marketingprogramm_partner_mitarbeiter";
$this->partner->fieldName = "partner";
$this->partner->aliasFieldName = "marketingprogramm_partner_mitarbeiter_partner";
$this->partner->label = "Partner";
}
return $this;
}
public function loadAnrede() {
if ($this->anrede == null) {
$this->anrede = new \LuzernTourismus\MarketingProgramm\Data\Anrede\AnredeExternalType($this, "marketingprogramm_partner_mitarbeiter_anrede");
$this->anrede->tableName = "marketingprogramm_partner_mitarbeiter";
$this->anrede->fieldName = "anrede";
$this->anrede->aliasFieldName = "marketingprogramm_partner_mitarbeiter_anrede";
$this->anrede->label = "Anrede";
}
return $this;
}
}