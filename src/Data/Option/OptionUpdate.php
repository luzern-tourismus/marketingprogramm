<?php
namespace LuzernTourismus\MarketingProgramm\Data\Option;
use Nemundo\Model\Data\AbstractModelUpdate;
class OptionUpdate extends AbstractModelUpdate {
/**
* @var OptionModel
*/
public $model;

/**
* @var bool
*/
public $isDeleted;

/**
* @var string
*/
public $aktivitaetId;

/**
* @var string
*/
public $option;

/**
* @var bool
*/
public $hasPreis;

/**
* @var int
*/
public $preis;

public function __construct() {
parent::__construct();
$this->model = new OptionModel();
}
public function update() {
$this->typeValueList->setModelValue($this->model->isDeleted, $this->isDeleted);
$this->typeValueList->setModelValue($this->model->aktivitaetId, $this->aktivitaetId);
$this->typeValueList->setModelValue($this->model->option, $this->option);
$this->typeValueList->setModelValue($this->model->hasPreis, $this->hasPreis);
$this->typeValueList->setModelValue($this->model->preis, $this->preis);
parent::update();
}
}