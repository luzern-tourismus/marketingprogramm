<?php
namespace LuzernTourismus\MarketingProgramm\Data\AktivitaetChangeLog;
class AktivitaetChangeLogRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var AktivitaetChangeLogModel
*/
public $model;

/**
* @var string
*/
public $id;

/**
* @var int
*/
public $aktivitaetId;

/**
* @var \LuzernTourismus\MarketingProgramm\Data\Aktivitaet\AktivitaetRow
*/
public $aktivitaet;

/**
* @var string
*/
public $userId;

/**
* @var \Nemundo\User\Reader\User\UserDataRow
*/
public $user;

/**
* @var \Nemundo\Core\Type\DateTime\DateTime
*/
public $dateTime;

/**
* @var bool
*/
public $aktivitaetHasChanged;

/**
* @var string
*/
public $aktivitaetOld;

/**
* @var string
*/
public $aktivitaetNew;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model, $multiLanguage = false) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->aktivitaetId = intval($this->getModelValue($model->aktivitaetId));
if ($model->aktivitaet !== null) {
$this->loadLuzernTourismusMarketingProgrammDataAktivitaetAktivitaetaktivitaetRow($model->aktivitaet);
}
$this->userId = $this->getModelValue($model->userId);
if ($model->user !== null) {
$this->loadNemundoUserDataUserUseruserRow($model->user);
}
$this->dateTime = new \Nemundo\Core\Type\DateTime\DateTime($this->getModelValue($model->dateTime));
$this->aktivitaetHasChanged = boolval($this->getModelValue($model->aktivitaetHasChanged));
$this->aktivitaetOld = $this->getModelValue($model->aktivitaetOld);
$this->aktivitaetNew = $this->getModelValue($model->aktivitaetNew);
}
private function loadLuzernTourismusMarketingProgrammDataAktivitaetAktivitaetaktivitaetRow($model) {
$this->aktivitaet = new \LuzernTourismus\MarketingProgramm\Data\Aktivitaet\AktivitaetRow($this->row, $model);
}
private function loadNemundoUserDataUserUseruserRow($model) {
$this->user = new \Nemundo\User\Reader\User\UserDataRow($this->row, $model);
}
}