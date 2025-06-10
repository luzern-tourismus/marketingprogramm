<?php
namespace LuzernTourismus\MarketingProgramm\Data\Aktivitaet;
class AktivitaetModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $aktivitaet;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $datum;

/**
* @var \Nemundo\Model\Type\Text\LargeTextType
*/
public $kosten;

/**
* @var \Nemundo\Model\Type\Text\LargeTextType
*/
public $leistung;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $zielpublikum;

/**
* @var \Nemundo\Model\Type\External\Id\NumberExternalIdType
*/
public $kategorieId;

/**
* @var \LuzernTourismus\MarketingProgramm\Data\Kategorie\KategorieExternalType
*/
public $kategorie;

/**
* @var \Nemundo\Model\Type\External\Id\NumberExternalIdType
*/
public $kontaktId;

/**
* @var \LuzernTourismus\MarketingProgramm\Data\Kontakt\KontaktExternalType
*/
public $kontakt;

/**
* @var \Nemundo\Model\Type\Number\YesNoType
*/
public $isDeleted;

protected function loadModel() {
$this->tableName = "marketingprogramm_aktivitaet";
$this->aliasTableName = "marketingprogramm_aktivitaet";
$this->label = "Aktivität";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "marketingprogramm_aktivitaet";
$this->id->externalTableName = "marketingprogramm_aktivitaet";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "marketingprogramm_aktivitaet_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->aktivitaet = new \Nemundo\Model\Type\Text\TextType($this);
$this->aktivitaet->tableName = "marketingprogramm_aktivitaet";
$this->aktivitaet->externalTableName = "marketingprogramm_aktivitaet";
$this->aktivitaet->fieldName = "aktivitaet";
$this->aktivitaet->aliasFieldName = "marketingprogramm_aktivitaet_aktivitaet";
$this->aktivitaet->label = "Aktivität";
$this->aktivitaet->allowNullValue = false;
$this->aktivitaet->length = 255;

$this->datum = new \Nemundo\Model\Type\Text\TextType($this);
$this->datum->tableName = "marketingprogramm_aktivitaet";
$this->datum->externalTableName = "marketingprogramm_aktivitaet";
$this->datum->fieldName = "datum";
$this->datum->aliasFieldName = "marketingprogramm_aktivitaet_datum";
$this->datum->label = "Datum";
$this->datum->allowNullValue = true;
$this->datum->length = 255;

$this->kosten = new \Nemundo\Model\Type\Text\LargeTextType($this);
$this->kosten->tableName = "marketingprogramm_aktivitaet";
$this->kosten->externalTableName = "marketingprogramm_aktivitaet";
$this->kosten->fieldName = "kosten";
$this->kosten->aliasFieldName = "marketingprogramm_aktivitaet_kosten";
$this->kosten->label = "Kosten";
$this->kosten->allowNullValue = false;

$this->leistung = new \Nemundo\Model\Type\Text\LargeTextType($this);
$this->leistung->tableName = "marketingprogramm_aktivitaet";
$this->leistung->externalTableName = "marketingprogramm_aktivitaet";
$this->leistung->fieldName = "leistung";
$this->leistung->aliasFieldName = "marketingprogramm_aktivitaet_leistung";
$this->leistung->label = "Leistung";
$this->leistung->allowNullValue = false;

$this->zielpublikum = new \Nemundo\Model\Type\Text\TextType($this);
$this->zielpublikum->tableName = "marketingprogramm_aktivitaet";
$this->zielpublikum->externalTableName = "marketingprogramm_aktivitaet";
$this->zielpublikum->fieldName = "zielpublikum";
$this->zielpublikum->aliasFieldName = "marketingprogramm_aktivitaet_zielpublikum";
$this->zielpublikum->label = "Zielpublikum";
$this->zielpublikum->allowNullValue = false;
$this->zielpublikum->length = 255;

$this->kategorieId = new \Nemundo\Model\Type\External\Id\NumberExternalIdType($this);
$this->kategorieId->tableName = "marketingprogramm_aktivitaet";
$this->kategorieId->fieldName = "kategorie";
$this->kategorieId->aliasFieldName = "marketingprogramm_aktivitaet_kategorie";
$this->kategorieId->label = "Kategorie";
$this->kategorieId->allowNullValue = true;

$this->kontaktId = new \Nemundo\Model\Type\External\Id\NumberExternalIdType($this);
$this->kontaktId->tableName = "marketingprogramm_aktivitaet";
$this->kontaktId->fieldName = "kontakt";
$this->kontaktId->aliasFieldName = "marketingprogramm_aktivitaet_kontakt";
$this->kontaktId->label = "Kontakt";
$this->kontaktId->allowNullValue = true;

$this->isDeleted = new \Nemundo\Model\Type\Number\YesNoType($this);
$this->isDeleted->tableName = "marketingprogramm_aktivitaet";
$this->isDeleted->externalTableName = "marketingprogramm_aktivitaet";
$this->isDeleted->fieldName = "is_deleted";
$this->isDeleted->aliasFieldName = "marketingprogramm_aktivitaet_is_deleted";
$this->isDeleted->label = "Is Deleted";
$this->isDeleted->allowNullValue = false;

$index = new \Nemundo\Model\Definition\Index\ModelIndex($this);
$index->indexName = "kategorie";
$index->addType($this->kategorieId);

}
public function loadKategorie() {
if ($this->kategorie == null) {
$this->kategorie = new \LuzernTourismus\MarketingProgramm\Data\Kategorie\KategorieExternalType($this, "marketingprogramm_aktivitaet_kategorie");
$this->kategorie->tableName = "marketingprogramm_aktivitaet";
$this->kategorie->fieldName = "kategorie";
$this->kategorie->aliasFieldName = "marketingprogramm_aktivitaet_kategorie";
$this->kategorie->label = "Kategorie";
}
return $this;
}
public function loadKontakt() {
if ($this->kontakt == null) {
$this->kontakt = new \LuzernTourismus\MarketingProgramm\Data\Kontakt\KontaktExternalType($this, "marketingprogramm_aktivitaet_kontakt");
$this->kontakt->tableName = "marketingprogramm_aktivitaet";
$this->kontakt->fieldName = "kontakt";
$this->kontakt->aliasFieldName = "marketingprogramm_aktivitaet_kontakt";
$this->kontakt->label = "Kontakt";
}
return $this;
}
}