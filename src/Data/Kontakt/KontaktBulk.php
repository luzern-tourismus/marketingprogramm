<?php
namespace LuzernTourismus\MarketingProgramm\Data\Kontakt;
class KontaktBulk extends \Nemundo\Model\Data\AbstractModelDataBulk {
/**
* @var KontaktModel
*/
protected $model;

/**
* @var string
*/
public $nachname;

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
public function save() {
$this->typeValueList->setModelValue($this->model->nachname, $this->nachname);
$this->typeValueList->setModelValue($this->model->vorname, $this->vorname);
$this->typeValueList->setModelValue($this->model->email, $this->email);
$this->typeValueList->setModelValue($this->model->telefon, $this->telefon);
$this->typeValueList->setModelValue($this->model->isDeleted, $this->isDeleted);
$id = parent::save();
return $id;
}
}