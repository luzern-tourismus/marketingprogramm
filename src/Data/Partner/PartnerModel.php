<?php
namespace LuzernTourismus\MarketingProgramm\Data\Partner;
class PartnerModel extends \Nemundo\Model\Definition\Model\AbstractModel {
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

/**
* @var \Nemundo\Model\Type\Number\YesNoType
*/
public $anmeldungFinalisiert;

/**
* @var \Nemundo\Model\Type\External\Id\NumberExternalIdType
*/
public $mitarbeiterId;

/**
* @var \LuzernTourismus\MarketingProgramm\Data\PartnerMitarbeiter\PartnerMitarbeiterExternalType
*/
public $mitarbeiter;

protected function loadModel() {
$this->tableName = "marketingprogramm_partner";
$this->aliasTableName = "marketingprogramm_partner";
$this->label = "Partner";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "marketingprogramm_partner";
$this->id->externalTableName = "marketingprogramm_partner";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "marketingprogramm_partner_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->firma = new \Nemundo\Model\Type\Text\TextType($this);
$this->firma->tableName = "marketingprogramm_partner";
$this->firma->externalTableName = "marketingprogramm_partner";
$this->firma->fieldName = "firma";
$this->firma->aliasFieldName = "marketingprogramm_partner_firma";
$this->firma->label = "Firma";
$this->firma->allowNullValue = false;
$this->firma->length = 255;

$this->isDeleted = new \Nemundo\Model\Type\Number\YesNoType($this);
$this->isDeleted->tableName = "marketingprogramm_partner";
$this->isDeleted->externalTableName = "marketingprogramm_partner";
$this->isDeleted->fieldName = "is_deleted";
$this->isDeleted->aliasFieldName = "marketingprogramm_partner_is_deleted";
$this->isDeleted->label = "Is Deleted";
$this->isDeleted->allowNullValue = false;

$this->strasse = new \Nemundo\Model\Type\Text\TextType($this);
$this->strasse->tableName = "marketingprogramm_partner";
$this->strasse->externalTableName = "marketingprogramm_partner";
$this->strasse->fieldName = "strasse";
$this->strasse->aliasFieldName = "marketingprogramm_partner_strasse";
$this->strasse->label = "Strasse";
$this->strasse->allowNullValue = true;
$this->strasse->length = 255;

$this->plz = new \Nemundo\Model\Type\Number\NumberType($this);
$this->plz->tableName = "marketingprogramm_partner";
$this->plz->externalTableName = "marketingprogramm_partner";
$this->plz->fieldName = "plz";
$this->plz->aliasFieldName = "marketingprogramm_partner_plz";
$this->plz->label = "PLZ";
$this->plz->allowNullValue = true;

$this->ort = new \Nemundo\Model\Type\Text\TextType($this);
$this->ort->tableName = "marketingprogramm_partner";
$this->ort->externalTableName = "marketingprogramm_partner";
$this->ort->fieldName = "ort";
$this->ort->aliasFieldName = "marketingprogramm_partner_ort";
$this->ort->label = "Ort";
$this->ort->allowNullValue = true;
$this->ort->length = 255;

$this->anmeldungFinalisiert = new \Nemundo\Model\Type\Number\YesNoType($this);
$this->anmeldungFinalisiert->tableName = "marketingprogramm_partner";
$this->anmeldungFinalisiert->externalTableName = "marketingprogramm_partner";
$this->anmeldungFinalisiert->fieldName = "anmeldung_finalisiert";
$this->anmeldungFinalisiert->aliasFieldName = "marketingprogramm_partner_anmeldung_finalisiert";
$this->anmeldungFinalisiert->label = "Anmeldung Finalisiert";
$this->anmeldungFinalisiert->allowNullValue = false;

$this->mitarbeiterId = new \Nemundo\Model\Type\External\Id\NumberExternalIdType($this);
$this->mitarbeiterId->tableName = "marketingprogramm_partner";
$this->mitarbeiterId->fieldName = "mitarbeiter";
$this->mitarbeiterId->aliasFieldName = "marketingprogramm_partner_mitarbeiter";
$this->mitarbeiterId->label = "Mitarbeiter";
$this->mitarbeiterId->allowNullValue = true;

}
public function loadMitarbeiter() {
if ($this->mitarbeiter == null) {
$this->mitarbeiter = new \LuzernTourismus\MarketingProgramm\Data\PartnerMitarbeiter\PartnerMitarbeiterExternalType($this, "marketingprogramm_partner_mitarbeiter");
$this->mitarbeiter->tableName = "marketingprogramm_partner";
$this->mitarbeiter->fieldName = "mitarbeiter";
$this->mitarbeiter->aliasFieldName = "marketingprogramm_partner_mitarbeiter";
$this->mitarbeiter->label = "Mitarbeiter";
}
return $this;
}
}