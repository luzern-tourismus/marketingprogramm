<?php
namespace LuzernTourismus\MarketingProgramm\Data\Partner;
use Nemundo\Model\Data\AbstractModelUpdate;
class PartnerUpdate extends AbstractModelUpdate {
/**
* @var PartnerModel
*/
public $model;

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
public function update() {
$this->typeValueList->setModelValue($this->model->firma, $this->firma);
$this->typeValueList->setModelValue($this->model->isDeleted, $this->isDeleted);
parent::update();
}
}