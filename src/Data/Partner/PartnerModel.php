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

}
}