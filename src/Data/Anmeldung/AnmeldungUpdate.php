<?php
namespace LuzernTourismus\MarketingProgramm\Data\Anmeldung;
use Nemundo\Model\Data\AbstractModelUpdate;
class AnmeldungUpdate extends AbstractModelUpdate {
/**
* @var AnmeldungModel
*/
public $model;

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
public function update() {
$this->typeValueList->setModelValue($this->model->partnerId, $this->partnerId);
$this->typeValueList->setModelValue($this->model->isDeleted, $this->isDeleted);
$this->typeValueList->setModelValue($this->model->optionId, $this->optionId);
parent::update();
}
}