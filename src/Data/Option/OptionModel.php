<?php
namespace LuzernTourismus\MarketingProgramm\Data\Option;
class OptionModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Number\YesNoType
*/
public $isDeleted;

/**
* @var \Nemundo\Model\Type\External\Id\NumberExternalIdType
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

protected function loadModel() {
$this->tableName = "marketingprogramm_option";
$this->aliasTableName = "marketingprogramm_option";
$this->label = "Option";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "marketingprogramm_option";
$this->id->externalTableName = "marketingprogramm_option";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "marketingprogramm_option_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->isDeleted = new \Nemundo\Model\Type\Number\YesNoType($this);
$this->isDeleted->tableName = "marketingprogramm_option";
$this->isDeleted->externalTableName = "marketingprogramm_option";
$this->isDeleted->fieldName = "is_deleted";
$this->isDeleted->aliasFieldName = "marketingprogramm_option_is_deleted";
$this->isDeleted->label = "Is Deleted";
$this->isDeleted->allowNullValue = false;

$this->aktivitaetId = new \Nemundo\Model\Type\External\Id\NumberExternalIdType($this);
$this->aktivitaetId->tableName = "marketingprogramm_option";
$this->aktivitaetId->fieldName = "aktivitaet";
$this->aktivitaetId->aliasFieldName = "marketingprogramm_option_aktivitaet";
$this->aktivitaetId->label = "Aktivität";
$this->aktivitaetId->allowNullValue = false;

$this->option = new \Nemundo\Model\Type\Text\TextType($this);
$this->option->tableName = "marketingprogramm_option";
$this->option->externalTableName = "marketingprogramm_option";
$this->option->fieldName = "option";
$this->option->aliasFieldName = "marketingprogramm_option_option";
$this->option->label = "Option";
$this->option->allowNullValue = false;
$this->option->length = 255;

$this->hasPreis = new \Nemundo\Model\Type\Number\YesNoType($this);
$this->hasPreis->tableName = "marketingprogramm_option";
$this->hasPreis->externalTableName = "marketingprogramm_option";
$this->hasPreis->fieldName = "has_preis";
$this->hasPreis->aliasFieldName = "marketingprogramm_option_has_preis";
$this->hasPreis->label = "Has Preis";
$this->hasPreis->allowNullValue = false;

$this->preis = new \Nemundo\Model\Type\Number\NumberType($this);
$this->preis->tableName = "marketingprogramm_option";
$this->preis->externalTableName = "marketingprogramm_option";
$this->preis->fieldName = "preis";
$this->preis->aliasFieldName = "marketingprogramm_option_preis";
$this->preis->label = "Preis";
$this->preis->allowNullValue = true;

}
public function loadAktivitaet() {
if ($this->aktivitaet == null) {
$this->aktivitaet = new \LuzernTourismus\MarketingProgramm\Data\Aktivitaet\AktivitaetExternalType($this, "marketingprogramm_option_aktivitaet");
$this->aktivitaet->tableName = "marketingprogramm_option";
$this->aktivitaet->fieldName = "aktivitaet";
$this->aktivitaet->aliasFieldName = "marketingprogramm_option_aktivitaet";
$this->aktivitaet->label = "Aktivität";
}
return $this;
}
}