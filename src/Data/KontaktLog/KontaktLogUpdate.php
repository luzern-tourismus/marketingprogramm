<?php
namespace LuzernTourismus\MarketingProgramm\Data\KontaktLog;
use Nemundo\Model\Data\AbstractModelUpdate;
class KontaktLogUpdate extends AbstractModelUpdate {
/**
* @var KontaktLogModel
*/
public $model;

/**
* @var string
*/
public $kontaktId;

/**
* @var string
*/
public $logId;

/**
* @var bool
*/
public $nachnameHasChanged;

/**
* @var string
*/
public $nachnameOld;

/**
* @var string
*/
public $nachnameNew;

/**
* @var bool
*/
public $vornameHasChanged;

/**
* @var string
*/
public $vornameOld;

/**
* @var string
*/
public $vornameNew;

/**
* @var bool
*/
public $emailHasChanged;

/**
* @var string
*/
public $emailOld;

/**
* @var string
*/
public $emailNew;

/**
* @var bool
*/
public $telefonHasChanged;

/**
* @var string
*/
public $telefonOld;

/**
* @var string
*/
public $telefonNew;

public function __construct() {
parent::__construct();
$this->model = new KontaktLogModel();
}
public function update() {
$this->typeValueList->setModelValue($this->model->kontaktId, $this->kontaktId);
$this->typeValueList->setModelValue($this->model->logId, $this->logId);
$this->typeValueList->setModelValue($this->model->nachnameHasChanged, $this->nachnameHasChanged);
$this->typeValueList->setModelValue($this->model->nachnameOld, $this->nachnameOld);
$this->typeValueList->setModelValue($this->model->nachnameNew, $this->nachnameNew);
$this->typeValueList->setModelValue($this->model->vornameHasChanged, $this->vornameHasChanged);
$this->typeValueList->setModelValue($this->model->vornameOld, $this->vornameOld);
$this->typeValueList->setModelValue($this->model->vornameNew, $this->vornameNew);
$this->typeValueList->setModelValue($this->model->emailHasChanged, $this->emailHasChanged);
$this->typeValueList->setModelValue($this->model->emailOld, $this->emailOld);
$this->typeValueList->setModelValue($this->model->emailNew, $this->emailNew);
$this->typeValueList->setModelValue($this->model->telefonHasChanged, $this->telefonHasChanged);
$this->typeValueList->setModelValue($this->model->telefonOld, $this->telefonOld);
$this->typeValueList->setModelValue($this->model->telefonNew, $this->telefonNew);
parent::update();
}
}