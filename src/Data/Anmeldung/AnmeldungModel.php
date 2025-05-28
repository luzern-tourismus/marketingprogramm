<?php
namespace LuzernTourismus\MarketingProgramm\Data\Anmeldung;
class AnmeldungModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\External\Id\NumberExternalIdType
*/
public $aktivitaetId;

/**
* @var \LuzernTourismus\MarketingProgramm\Data\Aktivitaet\AktivitaetExternalType
*/
public $aktivitaet;

/**
* @var \Nemundo\Model\Type\External\Id\NumberExternalIdType
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

protected function loadModel() {
$this->tableName = "marketingprogramm_anmeldung";
$this->aliasTableName = "marketingprogramm_anmeldung";
$this->label = "Anmeldung";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "marketingprogramm_anmeldung";
$this->id->externalTableName = "marketingprogramm_anmeldung";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "marketingprogramm_anmeldung_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->aktivitaetId = new \Nemundo\Model\Type\External\Id\NumberExternalIdType($this);
$this->aktivitaetId->tableName = "marketingprogramm_anmeldung";
$this->aktivitaetId->fieldName = "aktivitaet";
$this->aktivitaetId->aliasFieldName = "marketingprogramm_anmeldung_aktivitaet";
$this->aktivitaetId->label = "Aktivität";
$this->aktivitaetId->allowNullValue = false;

$this->partnerId = new \Nemundo\Model\Type\External\Id\NumberExternalIdType($this);
$this->partnerId->tableName = "marketingprogramm_anmeldung";
$this->partnerId->fieldName = "partner";
$this->partnerId->aliasFieldName = "marketingprogramm_anmeldung_partner";
$this->partnerId->label = "Partner";
$this->partnerId->allowNullValue = false;

$this->isDeleted = new \Nemundo\Model\Type\Number\YesNoType($this);
$this->isDeleted->tableName = "marketingprogramm_anmeldung";
$this->isDeleted->externalTableName = "marketingprogramm_anmeldung";
$this->isDeleted->fieldName = "is_deleted";
$this->isDeleted->aliasFieldName = "marketingprogramm_anmeldung_is_deleted";
$this->isDeleted->label = "Is Deleted";
$this->isDeleted->allowNullValue = false;

$index = new \Nemundo\Model\Definition\Index\ModelUniqueIndex($this);
$index->indexName = "aktivitaet_partner";
$index->addType($this->aktivitaetId);
$index->addType($this->partnerId);

}
public function loadAktivitaet() {
if ($this->aktivitaet == null) {
$this->aktivitaet = new \LuzernTourismus\MarketingProgramm\Data\Aktivitaet\AktivitaetExternalType($this, "marketingprogramm_anmeldung_aktivitaet");
$this->aktivitaet->tableName = "marketingprogramm_anmeldung";
$this->aktivitaet->fieldName = "aktivitaet";
$this->aktivitaet->aliasFieldName = "marketingprogramm_anmeldung_aktivitaet";
$this->aktivitaet->label = "Aktivität";
}
return $this;
}
public function loadPartner() {
if ($this->partner == null) {
$this->partner = new \LuzernTourismus\MarketingProgramm\Data\Partner\PartnerExternalType($this, "marketingprogramm_anmeldung_partner");
$this->partner->tableName = "marketingprogramm_anmeldung";
$this->partner->fieldName = "partner";
$this->partner->aliasFieldName = "marketingprogramm_anmeldung_partner";
$this->partner->label = "Partner";
}
return $this;
}
}