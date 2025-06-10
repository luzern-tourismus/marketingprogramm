<?php
namespace LuzernTourismus\MarketingProgramm\Data\Anmeldung;
class AnmeldungBulk extends \Nemundo\Model\Data\AbstractModelDataBulk {
/**
* @var AnmeldungModel
*/
protected $model;

/**
* @var string
*/
public $partnerId;

/**
* @var bool
*/
public $isDeleted;

/**
* @var string
*/
public $optionId;

public function __construct() {
parent::__construct();
$this->model = new AnmeldungModel();
}
public function save() {
$this->typeValueList->setModelValue($this->model->partnerId, $this->partnerId);
$this->typeValueList->setModelValue($this->model->isDeleted, $this->isDeleted);
$this->typeValueList->setModelValue($this->model->optionId, $this->optionId);
$id = parent::save();
return $id;
}
}