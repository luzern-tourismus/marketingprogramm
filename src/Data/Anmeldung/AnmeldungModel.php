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
* @var \Nemundo\Model\Type\External\Id\NumberExternalIdType
*/
public $optionId;

/**
* @var \LuzernTourismus\MarketingProgramm\Data\Option\OptionExternalType
*/
public $option;

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

$this->optionId = new \Nemundo\Model\Type\External\Id\NumberExternalIdType($this);
$this->optionId->tableName = "marketingprogramm_anmeldung";
$this->optionId->fieldName = "option";
$this->optionId->aliasFieldName = "marketingprogramm_anmeldung_option";
$this->optionId->label = "Option";
$this->optionId->allowNullValue = false;

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
public function loadOption() {
if ($this->option == null) {
$this->option = new \LuzernTourismus\MarketingProgramm\Data\Option\OptionExternalType($this, "marketingprogramm_anmeldung_option");
$this->option->tableName = "marketingprogramm_anmeldung";
$this->option->fieldName = "option";
$this->option->aliasFieldName = "marketingprogramm_anmeldung_option";
$this->option->label = "Option";
}
return $this;
}
}