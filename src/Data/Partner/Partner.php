<?php
namespace LuzernTourismus\MarketingProgramm\Data\Partner;
class Partner extends \Nemundo\Model\Data\AbstractModelData {
/**
* @var PartnerModel
*/
protected $model;

/**
* @var string
*/
public $firma;

/**
* @var bool
*/
public $isDeleted;

public function __construct() {
parent::__construct();
$this->model = new PartnerModel();
}
public function save() {
$this->typeValueList->setModelValue($this->model->firma, $this->firma);
$this->typeValueList->setModelValue($this->model->isDeleted, $this->isDeleted);
$id = parent::save();
return $id;
}
}