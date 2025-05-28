<?php
namespace LuzernTourismus\MarketingProgramm\Data\Anmeldung;
class AnmeldungExternalType extends \Nemundo\Model\Type\External\ExternalType {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $aktivitaetId;

/**
* @var \LuzernTourismus\MarketingProgramm\Data\Aktivitaet\AktivitaetExternalType
*/
public $aktivitaet;

/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $partnerId;

/**
* @var \LuzernTourismus\MarketingProgramm\Data\Partner\PartnerExternalType
*/
public $partner;

/**
* @var \Nemundo\Model\Type\Number\YesNoType
*/
public $isDeleted;

protected function loadExternalType() {
parent::loadExternalType();
$this->externalModelClassName = AnmeldungModel::class;
$this->externalTableName = "marketingprogramm_anmeldung";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->externalTableName = $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->aktivitaetId = new \Nemundo\Model\Type\Id\IdType();
$this->aktivitaetId->fieldName = "aktivitaet";
$this->aktivitaetId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->aktivitaetId->aliasFieldName = $this->aktivitaetId->tableName ."_".$this->aktivitaetId->fieldName;
$this->aktivitaetId->label = "Aktivität";
$this->addType($this->aktivitaetId);

$this->partnerId = new \Nemundo\Model\Type\Id\IdType();
$this->partnerId->fieldName = "partner";
$this->partnerId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->partnerId->aliasFieldName = $this->partnerId->tableName ."_".$this->partnerId->fieldName;
$this->partnerId->label = "Partner";
$this->addType($this->partnerId);

$this->isDeleted = new \Nemundo\Model\Type\Number\YesNoType();
$this->isDeleted->fieldName = "is_deleted";
$this->isDeleted->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->isDeleted->externalTableName = $this->externalTableName;
$this->isDeleted->aliasFieldName = $this->isDeleted->tableName . "_" . $this->isDeleted->fieldName;
$this->isDeleted->label = "Is Deleted";
$this->addType($this->isDeleted);

}
public function loadAktivitaet() {
if ($this->aktivitaet == null) {
$this->aktivitaet = new \LuzernTourismus\MarketingProgramm\Data\Aktivitaet\AktivitaetExternalType(null, $this->parentFieldName . "_aktivitaet");
$this->aktivitaet->fieldName = "aktivitaet";
$this->aktivitaet->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->aktivitaet->aliasFieldName = $this->aktivitaet->tableName ."_".$this->aktivitaet->fieldName;
$this->aktivitaet->label = "Aktivität";
$this->addType($this->aktivitaet);
}
return $this;
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
}