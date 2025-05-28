<?php
namespace LuzernTourismus\MarketingProgramm\Data\Kategorie;
class KategorieExternalType extends \Nemundo\Model\Type\External\ExternalType {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $kategorie;

/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $themaId;

/**
* @var \LuzernTourismus\MarketingProgramm\Data\Thema\ThemaExternalType
*/
public $thema;

/**
* @var \Nemundo\Model\Type\Number\YesNoType
*/
public $isDeleted;

protected function loadExternalType() {
parent::loadExternalType();
$this->externalModelClassName = KategorieModel::class;
$this->externalTableName = "marketingprogramm_kategorie";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->externalTableName = $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->kategorie = new \Nemundo\Model\Type\Text\TextType();
$this->kategorie->fieldName = "kategorie";
$this->kategorie->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->kategorie->externalTableName = $this->externalTableName;
$this->kategorie->aliasFieldName = $this->kategorie->tableName . "_" . $this->kategorie->fieldName;
$this->kategorie->label = "Kategorie";
$this->addType($this->kategorie);

$this->themaId = new \Nemundo\Model\Type\Id\IdType();
$this->themaId->fieldName = "thema";
$this->themaId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->themaId->aliasFieldName = $this->themaId->tableName ."_".$this->themaId->fieldName;
$this->themaId->label = "Thema";
$this->addType($this->themaId);

$this->isDeleted = new \Nemundo\Model\Type\Number\YesNoType();
$this->isDeleted->fieldName = "is_deleted";
$this->isDeleted->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->isDeleted->externalTableName = $this->externalTableName;
$this->isDeleted->aliasFieldName = $this->isDeleted->tableName . "_" . $this->isDeleted->fieldName;
$this->isDeleted->label = "Is Deleted";
$this->addType($this->isDeleted);

}
public function loadThema() {
if ($this->thema == null) {
$this->thema = new \LuzernTourismus\MarketingProgramm\Data\Thema\ThemaExternalType(null, $this->parentFieldName . "_thema");
$this->thema->fieldName = "thema";
$this->thema->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->thema->aliasFieldName = $this->thema->tableName ."_".$this->thema->fieldName;
$this->thema->label = "Thema";
$this->addType($this->thema);
}
return $this;
}
}