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
public $partnerId;

/**
* @var \LuzernTourismus\MarketingProgramm\Data\Partner\PartnerExternalType
*/
public $partner;

/**
* @var \Nemundo\Model\Type\Number\YesNoType
*/
public $isDeleted;

/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $optionId;

/**
* @var \LuzernTourismus\MarketingProgramm\Data\Option\OptionExternalType
*/
public $option;

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

$this->optionId = new \Nemundo\Model\Type\Id\IdType();
$this->optionId->fieldName = "option";
$this->optionId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->optionId->aliasFieldName = $this->optionId->tableName ."_".$this->optionId->fieldName;
$this->optionId->label = "Option";
$this->addType($this->optionId);

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
public function loadOption() {
if ($this->option == null) {
$this->option = new \LuzernTourismus\MarketingProgramm\Data\Option\OptionExternalType(null, $this->parentFieldName . "_option");
$this->option->fieldName = "option";
$this->option->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->option->aliasFieldName = $this->option->tableName ."_".$this->option->fieldName;
$this->option->label = "Option";
$this->addType($this->option);
}
return $this;
}
}