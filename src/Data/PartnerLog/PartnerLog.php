<?php
namespace LuzernTourismus\MarketingProgramm\Data\PartnerLog;
class PartnerLog extends \Nemundo\Model\Data\AbstractModelData {
/**
* @var PartnerLogModel
*/
protected $model;

/**
* @var string
*/
public $partnerId;

/**
* @var string
*/
public $logId;

/**
* @var bool
*/
public $firmaHasChanged;

/**
* @var string
*/
public $firmaOld;

/**
* @var string
*/
public $firmaNew;

/**
* @var bool
*/
public $strasseHasChanged;

/**
* @var string
*/
public $strasseOld;

public function __construct() {
parent::__construct();
$this->model = new PartnerLogModel();
}
public function save() {
$this->typeValueList->setModelValue($this->model->partnerId, $this->partnerId);
$this->typeValueList->setModelValue($this->model->logId, $this->logId);
$this->typeValueList->setModelValue($this->model->firmaHasChanged, $this->firmaHasChanged);
$this->typeValueList->setModelValue($this->model->firmaOld, $this->firmaOld);
$this->typeValueList->setModelValue($this->model->firmaNew, $this->firmaNew);
$this->typeValueList->setModelValue($this->model->strasseHasChanged, $this->strasseHasChanged);
$this->typeValueList->setModelValue($this->model->strasseOld, $this->strasseOld);
$id = parent::save();
return $id;
}
}