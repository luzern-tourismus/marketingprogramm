<?php
namespace LuzernTourismus\MarketingProgramm\Data\Region;
class Region extends \Nemundo\Model\Data\AbstractModelData {
/**
* @var RegionModel
*/
protected $model;

/**
* @var string
*/
public $region;

/**
* @var bool
*/
public $isDeleted;

public function __construct() {
parent::__construct();
$this->model = new RegionModel();
}
public function save() {
$this->typeValueList->setModelValue($this->model->region, $this->region);
$this->typeValueList->setModelValue($this->model->isDeleted, $this->isDeleted);
$id = parent::save();
return $id;
}
}