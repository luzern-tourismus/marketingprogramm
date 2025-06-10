<?php
namespace LuzernTourismus\MarketingProgramm\Data\Option;
class OptionExternalType extends \Nemundo\Model\Type\External\ExternalType {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Number\YesNoType
*/
public $isDeleted;

/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $aktivitaetId;

/**
* @var \LuzernTourismus\MarketingProgramm\Data\Aktivitaet\AktivitaetExternalType
*/
public $aktivitaet;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $option;

/**
* @var \Nemundo\Model\Type\Number\YesNoType
*/
public $hasPreis;

/**
* @var \Nemundo\Model\Type\Number\NumberType
*/
public $preis;

protected function loadExternalType() {
parent::loadExternalType();
$this->externalModelClassName = OptionModel::class;
$this->externalTableName = "marketingprogramm_option";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->externalTableName = $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->isDeleted = new \Nemundo\Model\Type\Number\YesNoType();
$this->isDeleted->fieldName = "is_deleted";
$this->isDeleted->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->isDeleted->externalTableName = $this->externalTableName;
$this->isDeleted->aliasFieldName = $this->isDeleted->tableName . "_" . $this->isDeleted->fieldName;
$this->isDeleted->label = "Is Deleted";
$this->addType($this->isDeleted);

$this->aktivitaetId = new \Nemundo\Model\Type\Id\IdType();
$this->aktivitaetId->fieldName = "aktivitaet";
$this->aktivitaetId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->aktivitaetId->aliasFieldName = $this->aktivitaetId->tableName ."_".$this->aktivitaetId->fieldName;
$this->aktivitaetId->label = "Aktivität";
$this->addType($this->aktivitaetId);

$this->option = new \Nemundo\Model\Type\Text\TextType();
$this->option->fieldName = "option";
$this->option->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->option->externalTableName = $this->externalTableName;
$this->option->aliasFieldName = $this->option->tableName . "_" . $this->option->fieldName;
$this->option->label = "Option";
$this->addType($this->option);

$this->hasPreis = new \Nemundo\Model\Type\Number\YesNoType();
$this->hasPreis->fieldName = "has_preis";
$this->hasPreis->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->hasPreis->externalTableName = $this->externalTableName;
$this->hasPreis->aliasFieldName = $this->hasPreis->tableName . "_" . $this->hasPreis->fieldName;
$this->hasPreis->label = "Has Preis";
$this->addType($this->hasPreis);

$this->preis = new \Nemundo\Model\Type\Number\NumberType();
$this->preis->fieldName = "preis";
$this->preis->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->preis->externalTableName = $this->externalTableName;
$this->preis->aliasFieldName = $this->preis->tableName . "_" . $this->preis->fieldName;
$this->preis->label = "Preis";
$this->addType($this->preis);

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
}