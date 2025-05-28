<?php
namespace LuzernTourismus\MarketingProgramm\Data\PartnerMitarbeiter;
use Nemundo\Model\Data\AbstractModelUpdate;
class PartnerMitarbeiterUpdate extends AbstractModelUpdate {
/**
* @var PartnerMitarbeiterModel
*/
public $model;

/**
* @var string
*/
public $partnerId;

/**
* @var string
*/
public $name;

/**
* @var string
*/
public $vorname;

/**
* @var string
*/
public $email;

/**
* @var bool
*/
public $isDeleted;

public function __construct() {
parent::__construct();
$this->model = new PartnerMitarbeiterModel();
}
public function update() {
$this->typeValueList->setModelValue($this->model->partnerId, $this->partnerId);
$this->typeValueList->setModelValue($this->model->name, $this->name);
$this->typeValueList->setModelValue($this->model->vorname, $this->vorname);
$this->typeValueList->setModelValue($this->model->email, $this->email);
$this->typeValueList->setModelValue($this->model->isDeleted, $this->isDeleted);
parent::update();
}
}