<?php
namespace LuzernTourismus\MarketingProgramm\Data\Kategorie;
class Kategorie extends \Nemundo\Model\Data\AbstractModelData {
/**
* @var KategorieModel
*/
protected $model;

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
public function save() {
$this->typeValueList->setModelValue($this->model->kategorie, $this->kategorie);
$this->typeValueList->setModelValue($this->model->themaId, $this->themaId);
$this->typeValueList->setModelValue($this->model->isDeleted, $this->isDeleted);
$id = parent::save();
return $id;
}
}