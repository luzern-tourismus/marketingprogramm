<?php
namespace LuzernTourismus\MarketingProgramm\Data\Kontakt;
use Nemundo\Model\Data\AbstractModelUpdate;
class KontaktUpdate extends AbstractModelUpdate {
/**
* @var KontaktModel
*/
public $model;

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
* @var string
*/
public $telefon;

/**
* @var bool
*/
public $isDeleted;

public function __construct() {
parent::__construct();
$this->model = new KontaktModel();
}
public function update() {
$this->typeValueList->setModelValue($this->model->name, $this->name);
$this->typeValueList->setModelValue($this->model->vorname, $this->vorname);
$this->typeValueList->setModelValue($this->model->email, $this->email);
$this->typeValueList->setModelValue($this->model->telefon, $this->telefon);
$this->typeValueList->setModelValue($this->model->isDeleted, $this->isDeleted);
parent::update();
}
}