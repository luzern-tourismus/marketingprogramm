<?php
namespace LuzernTourismus\MarketingProgramm\Data\Partner;
class PartnerBulk extends \Nemundo\Model\Data\AbstractModelDataBulk {
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

/**
* @var string
*/
public $strasse;

/**
* @var int
*/
public $plz;

/**
* @var string
*/
public $ort;

/**
* @var bool
*/
public $anmeldungFinalisiert;

public function __construct() {
parent::__construct();
$this->model = new PartnerModel();
}
public function save() {
$this->typeValueList->setModelValue($this->model->firma, $this->firma);
$this->typeValueList->setModelValue($this->model->isDeleted, $this->isDeleted);
$this->typeValueList->setModelValue($this->model->strasse, $this->strasse);
$this->typeValueList->setModelValue($this->model->plz, $this->plz);
$this->typeValueList->setModelValue($this->model->ort, $this->ort);
$this->typeValueList->setModelValue($this->model->anmeldungFinalisiert, $this->anmeldungFinalisiert);
$id = parent::save();
return $id;
}
}