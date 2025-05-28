<?php
namespace LuzernTourismus\MarketingProgramm\Data\Anmeldung;
class Anmeldung extends \Nemundo\Model\Data\AbstractModelData {
/**
* @var AnmeldungModel
*/
protected $model;

/**
* @var string
*/
public $aktivitaetId;

/**
* @var string
*/
public $partnerId;

/**
* @var bool
*/
public $isDeleted;

public function __construct() {
parent::__construct();
$this->model = new AnmeldungModel();
}
public function save() {
$this->typeValueList->setModelValue($this->model->aktivitaetId, $this->aktivitaetId);
$this->typeValueList->setModelValue($this->model->partnerId, $this->partnerId);
$this->typeValueList->setModelValue($this->model->isDeleted, $this->isDeleted);
$id = parent::save();
return $id;
}
}