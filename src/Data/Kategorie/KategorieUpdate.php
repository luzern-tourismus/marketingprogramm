<?php
namespace LuzernTourismus\MarketingProgramm\Data\Kategorie;
use Nemundo\Model\Data\AbstractModelUpdate;
class KategorieUpdate extends AbstractModelUpdate {
/**
* @var KategorieModel
*/
public $model;

/**
* @var string
*/
public $kategorie;

/**
* @var string
*/
public $themaId;

/**
* @var bool
*/
public $isDeleted;

public function __construct() {
parent::__construct();
$this->model = new KategorieModel();
}
public function update() {
$this->typeValueList->setModelValue($this->model->kategorie, $this->kategorie);
$this->typeValueList->setModelValue($this->model->themaId, $this->themaId);
$this->typeValueList->setModelValue($this->model->isDeleted, $this->isDeleted);
parent::update();
}
}