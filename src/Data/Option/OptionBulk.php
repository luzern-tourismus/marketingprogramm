<?php
namespace LuzernTourismus\MarketingProgramm\Data\Option;
class OptionBulk extends \Nemundo\Model\Data\AbstractModelDataBulk {
/**
* @var OptionModel
*/
protected $model;

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

/**
* @var int
*/
public $itemOrder;

public function __construct() {
parent::__construct();
$this->model = new OptionModel();
}
public function save() {
$this->typeValueList->setModelValue($this->model->isDeleted, $this->isDeleted);
$this->typeValueList->setModelValue($this->model->aktivitaetId, $this->aktivitaetId);
$this->typeValueList->setModelValue($this->model->option, $this->option);
$this->typeValueList->setModelValue($this->model->hasPreis, $this->hasPreis);
$this->typeValueList->setModelValue($this->model->preis, $this->preis);
$this->typeValueList->setModelValue($this->model->itemOrder, $this->itemOrder);
$id = parent::save();
return $id;
}
}