<?php
namespace LuzernTourismus\MarketingProgramm\Data\Aktivitaet;
class AktivitaetExternalType extends \Nemundo\Model\Type\External\ExternalType {
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
* @var \Nemundo\Model\Type\Id\IdType
*/
public $kategorieId;

/**
* @var \LuzernTourismus\MarketingProgramm\Data\Kategorie\KategorieExternalType
*/
public $kategorie;

/**
* @var \Nemundo\Model\Type\Id\IdType
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

protected function loadExternalType() {
parent::loadExternalType();
$this->externalModelClassName = AktivitaetModel::class;
$this->externalTableName = "marketingprogramm_aktivitaet";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->externalTableName = $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->aktivitaet = new \Nemundo\Model\Type\Text\TextType();
$this->aktivitaet->fieldName = "aktivitaet";
$this->aktivitaet->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->aktivitaet->externalTableName = $this->externalTableName;
$this->aktivitaet->aliasFieldName = $this->aktivitaet->tableName . "_" . $this->aktivitaet->fieldName;
$this->aktivitaet->label = "Aktivität";
$this->addType($this->aktivitaet);

$this->datum = new \Nemundo\Model\Type\Text\TextType();
$this->datum->fieldName = "datum";
$this->datum->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->datum->externalTableName = $this->externalTableName;
$this->datum->aliasFieldName = $this->datum->tableName . "_" . $this->datum->fieldName;
$this->datum->label = "Datum";
$this->addType($this->datum);

$this->kosten = new \Nemundo\Model\Type\Text\LargeTextType();
$this->kosten->fieldName = "kosten";
$this->kosten->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->kosten->externalTableName = $this->externalTableName;
$this->kosten->aliasFieldName = $this->kosten->tableName . "_" . $this->kosten->fieldName;
$this->kosten->label = "Kosten";
$this->addType($this->kosten);

$this->leistung = new \Nemundo\Model\Type\Text\LargeTextType();
$this->leistung->fieldName = "leistung";
$this->leistung->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->leistung->externalTableName = $this->externalTableName;
$this->leistung->aliasFieldName = $this->leistung->tableName . "_" . $this->leistung->fieldName;
$this->leistung->label = "Leistung";
$this->addType($this->leistung);

$this->zielpublikum = new \Nemundo\Model\Type\Text\TextType();
$this->zielpublikum->fieldName = "zielpublikum";
$this->zielpublikum->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->zielpublikum->externalTableName = $this->externalTableName;
$this->zielpublikum->aliasFieldName = $this->zielpublikum->tableName . "_" . $this->zielpublikum->fieldName;
$this->zielpublikum->label = "Zielpublikum";
$this->addType($this->zielpublikum);

$this->kategorieId = new \Nemundo\Model\Type\Id\IdType();
$this->kategorieId->fieldName = "kategorie";
$this->kategorieId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->kategorieId->aliasFieldName = $this->kategorieId->tableName ."_".$this->kategorieId->fieldName;
$this->kategorieId->label = "Kategorie";
$this->addType($this->kategorieId);

$this->kontaktId = new \Nemundo\Model\Type\Id\IdType();
$this->kontaktId->fieldName = "kontakt";
$this->kontaktId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->kontaktId->aliasFieldName = $this->kontaktId->tableName ."_".$this->kontaktId->fieldName;
$this->kontaktId->label = "Kontakt";
$this->addType($this->kontaktId);

$this->isDeleted = new \Nemundo\Model\Type\Number\YesNoType();
$this->isDeleted->fieldName = "is_deleted";
$this->isDeleted->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->isDeleted->externalTableName = $this->externalTableName;
$this->isDeleted->aliasFieldName = $this->isDeleted->tableName . "_" . $this->isDeleted->fieldName;
$this->isDeleted->label = "Is Deleted";
$this->addType($this->isDeleted);

}
public function loadKategorie() {
if ($this->kategorie == null) {
$this->kategorie = new \LuzernTourismus\MarketingProgramm\Data\Kategorie\KategorieExternalType(null, $this->parentFieldName . "_kategorie");
$this->kategorie->fieldName = "kategorie";
$this->kategorie->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->kategorie->aliasFieldName = $this->kategorie->tableName ."_".$this->kategorie->fieldName;
$this->kategorie->label = "Kategorie";
$this->addType($this->kategorie);
}
return $this;
}
public function loadKontakt() {
if ($this->kontakt == null) {
$this->kontakt = new \LuzernTourismus\MarketingProgramm\Data\Kontakt\KontaktExternalType(null, $this->parentFieldName . "_kontakt");
$this->kontakt->fieldName = "kontakt";
$this->kontakt->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->kontakt->aliasFieldName = $this->kontakt->tableName ."_".$this->kontakt->fieldName;
$this->kontakt->label = "Kontakt";
$this->addType($this->kontakt);
}
return $this;
}
}