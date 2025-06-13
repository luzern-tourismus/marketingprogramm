<?php
namespace LuzernTourismus\MarketingProgramm\Data\KategorieLog;
class KategorieLogBulk extends \Nemundo\Model\Data\AbstractModelDataBulk {
/**
* @var KategorieLogModel
*/
protected $model;

/**
* @var string
*/
public $logId;

/**
* @var bool
*/
public $kategorieHasChanged;

/**
* @var string
*/
public $kategorieOld;

/**
* @var string
*/
public $kategorieNew;

/**
* @var bool
*/
public $themaHasChanged;

/**
* @var string
*/
public $themaOldId;

/**
* @var string
*/
public $themaNewId;

/**
* @var string
*/
public $kategorieId;

/**
* @var bool
*/
public $regionHasChanged;

/**
* @var string
*/
public $regionOldId;

/**
* @var string
*/
public $regionNewId;

public function __construct() {
parent::__construct();
$this->model = new KategorieLogModel();
}
public function save() {
$this->typeValueList->setModelValue($this->model->logId, $this->logId);
$this->typeValueList->setModelValue($this->model->kategorieHasChanged, $this->kategorieHasChanged);
$this->typeValueList->setModelValue($this->model->kategorieOld, $this->kategorieOld);
$this->typeValueList->setModelValue($this->model->kategorieNew, $this->kategorieNew);
$this->typeValueList->setModelValue($this->model->themaHasChanged, $this->themaHasChanged);
$this->typeValueList->setModelValue($this->model->themaOldId, $this->themaOldId);
$this->typeValueList->setModelValue($this->model->themaNewId, $this->themaNewId);
$this->typeValueList->setModelValue($this->model->kategorieId, $this->kategorieId);
$this->typeValueList->setModelValue($this->model->regionHasChanged, $this->regionHasChanged);
$this->typeValueList->setModelValue($this->model->regionOldId, $this->regionOldId);
$this->typeValueList->setModelValue($this->model->regionNewId, $this->regionNewId);
$id = parent::save();
return $id;
}
}