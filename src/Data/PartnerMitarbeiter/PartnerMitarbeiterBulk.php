<?php
namespace LuzernTourismus\MarketingProgramm\Data\PartnerMitarbeiter;
class PartnerMitarbeiterBulk extends \Nemundo\Model\Data\AbstractModelDataBulk {
/**
* @var PartnerMitarbeiterModel
*/
protected $model;

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

/**
* @var string
*/
public $anredeId;

public function __construct() {
parent::__construct();
$this->model = new PartnerMitarbeiterModel();
}
public function save() {
$this->typeValueList->setModelValue($this->model->partnerId, $this->partnerId);
$this->typeValueList->setModelValue($this->model->name, $this->name);
$this->typeValueList->setModelValue($this->model->vorname, $this->vorname);
$this->typeValueList->setModelValue($this->model->email, $this->email);
$this->typeValueList->setModelValue($this->model->isDeleted, $this->isDeleted);
$this->typeValueList->setModelValue($this->model->anredeId, $this->anredeId);
$id = parent::save();
return $id;
}
}