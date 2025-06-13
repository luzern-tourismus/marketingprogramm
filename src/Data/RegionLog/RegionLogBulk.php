<?php
namespace LuzernTourismus\MarketingProgramm\Data\RegionLog;
class RegionLogBulk extends \Nemundo\Model\Data\AbstractModelDataBulk {
/**
* @var RegionLogModel
*/
protected $model;

/**
* @var string
*/
public $logId;

/**
* @var string
*/
public $regionId;

/**
* @var bool
*/
public $regionHasChanged;

/**
* @var string
*/
public $regionOld;

/**
* @var string
*/
public $regionNew;

public function __construct() {
parent::__construct();
$this->model = new RegionLogModel();
}
public function save() {
$this->typeValueList->setModelValue($this->model->logId, $this->logId);
$this->typeValueList->setModelValue($this->model->regionId, $this->regionId);
$this->typeValueList->setModelValue($this->model->regionHasChanged, $this->regionHasChanged);
$this->typeValueList->setModelValue($this->model->regionOld, $this->regionOld);
$this->typeValueList->setModelValue($this->model->regionNew, $this->regionNew);
$id = parent::save();
return $id;
}
}