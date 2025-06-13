<?php
namespace LuzernTourismus\MarketingProgramm\Data\PartnerLog;
class PartnerLogModel extends \Nemundo\Model\Definition\Model\AbstractModel {
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
* @var \Nemundo\Model\Type\External\Id\NumberExternalIdType
*/
public $logId;

/**
* @var \LuzernTourismus\MarketingProgramm\Data\ChangeLog\ChangeLogExternalType
*/
public $log;

/**
* @var \Nemundo\Model\Type\Number\YesNoType
*/
public $firmaHasChanged;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $firmaOld;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $firmaNew;

/**
* @var \Nemundo\Model\Type\Number\YesNoType
*/
public $strasseHasChanged;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $strasseOld;

protected function loadModel() {
$this->tableName = "marketingprogramm_partner_log";
$this->aliasTableName = "marketingprogramm_partner_log";
$this->label = "Partner Log";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "marketingprogramm_partner_log";
$this->id->externalTableName = "marketingprogramm_partner_log";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "marketingprogramm_partner_log_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->partnerId = new \Nemundo\Model\Type\External\Id\NumberExternalIdType($this);
$this->partnerId->tableName = "marketingprogramm_partner_log";
$this->partnerId->fieldName = "partner";
$this->partnerId->aliasFieldName = "marketingprogramm_partner_log_partner";
$this->partnerId->label = "Partner";
$this->partnerId->allowNullValue = false;

$this->logId = new \Nemundo\Model\Type\External\Id\NumberExternalIdType($this);
$this->logId->tableName = "marketingprogramm_partner_log";
$this->logId->fieldName = "log";
$this->logId->aliasFieldName = "marketingprogramm_partner_log_log";
$this->logId->label = "Log";
$this->logId->allowNullValue = false;

$this->firmaHasChanged = new \Nemundo\Model\Type\Number\YesNoType($this);
$this->firmaHasChanged->tableName = "marketingprogramm_partner_log";
$this->firmaHasChanged->externalTableName = "marketingprogramm_partner_log";
$this->firmaHasChanged->fieldName = "firma_has_changed";
$this->firmaHasChanged->aliasFieldName = "marketingprogramm_partner_log_firma_has_changed";
$this->firmaHasChanged->label = "Firma Has Changed";
$this->firmaHasChanged->allowNullValue = false;

$this->firmaOld = new \Nemundo\Model\Type\Text\TextType($this);
$this->firmaOld->tableName = "marketingprogramm_partner_log";
$this->firmaOld->externalTableName = "marketingprogramm_partner_log";
$this->firmaOld->fieldName = "firma_old";
$this->firmaOld->aliasFieldName = "marketingprogramm_partner_log_firma_old";
$this->firmaOld->label = "Firma Old";
$this->firmaOld->allowNullValue = false;
$this->firmaOld->length = 255;

$this->firmaNew = new \Nemundo\Model\Type\Text\TextType($this);
$this->firmaNew->tableName = "marketingprogramm_partner_log";
$this->firmaNew->externalTableName = "marketingprogramm_partner_log";
$this->firmaNew->fieldName = "firma_new";
$this->firmaNew->aliasFieldName = "marketingprogramm_partner_log_firma_new";
$this->firmaNew->label = "Firma New";
$this->firmaNew->allowNullValue = false;
$this->firmaNew->length = 255;

$this->strasseHasChanged = new \Nemundo\Model\Type\Number\YesNoType($this);
$this->strasseHasChanged->tableName = "marketingprogramm_partner_log";
$this->strasseHasChanged->externalTableName = "marketingprogramm_partner_log";
$this->strasseHasChanged->fieldName = "strasse_has_changed";
$this->strasseHasChanged->aliasFieldName = "marketingprogramm_partner_log_strasse_has_changed";
$this->strasseHasChanged->label = "Strasse Has Changed";
$this->strasseHasChanged->allowNullValue = false;

$this->strasseOld = new \Nemundo\Model\Type\Text\TextType($this);
$this->strasseOld->tableName = "marketingprogramm_partner_log";
$this->strasseOld->externalTableName = "marketingprogramm_partner_log";
$this->strasseOld->fieldName = "strasse_old";
$this->strasseOld->aliasFieldName = "marketingprogramm_partner_log_strasse_old";
$this->strasseOld->label = "Strasse Old";
$this->strasseOld->allowNullValue = false;
$this->strasseOld->length = 255;

}
public function loadPartner() {
if ($this->partner == null) {
$this->partner = new \LuzernTourismus\MarketingProgramm\Data\Partner\PartnerExternalType($this, "marketingprogramm_partner_log_partner");
$this->partner->tableName = "marketingprogramm_partner_log";
$this->partner->fieldName = "partner";
$this->partner->aliasFieldName = "marketingprogramm_partner_log_partner";
$this->partner->label = "Partner";
}
return $this;
}
public function loadLog() {
if ($this->log == null) {
$this->log = new \LuzernTourismus\MarketingProgramm\Data\ChangeLog\ChangeLogExternalType($this, "marketingprogramm_partner_log_log");
$this->log->tableName = "marketingprogramm_partner_log";
$this->log->fieldName = "log";
$this->log->aliasFieldName = "marketingprogramm_partner_log_log";
$this->log->label = "Log";
}
return $this;
}
}