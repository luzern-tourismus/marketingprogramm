<?php
namespace LuzernTourismus\MarketingProgramm\Data\Aktivitaet;
class Aktivitaet extends \Nemundo\Model\Data\AbstractModelData {
/**
* @var AktivitaetModel
*/
protected $model;

/**
* @var string
*/
public $aktivitaet;

/**
* @var string
*/
public $datum;

/**
* @var string
*/
public $kosten;

/**
* @var string
*/
public $leistung;

/**
* @var string
*/
public $zielpublikum;

/**
* @var string
*/
public $kategorieId;

/**
* @var string
*/
public $kontaktId;

/**
* @var bool
*/
public $isDeleted;

public function __construct() {
parent::__construct();
$this->model = new AktivitaetModel();
}
public function save() {
$this->typeValueList->setModelValue($this->model->aktivitaet, $this->aktivitaet);
$this->typeValueList->setModelValue($this->model->datum, $this->datum);
$this->typeValueList->setModelValue($this->model->kosten, $this->kosten);
$this->typeValueList->setModelValue($this->model->leistung, $this->leistung);
$this->typeValueList->setModelValue($this->model->zielpublikum, $this->zielpublikum);
$this->typeValueList->setModelValue($this->model->kategorieId, $this->kategorieId);
$this->typeValueList->setModelValue($this->model->kontaktId, $this->kontaktId);
$this->typeValueList->setModelValue($this->model->isDeleted, $this->isDeleted);
$id = parent::save();
return $id;
}
}