<?php
namespace LuzernTourismus\MarketingProgramm\Data\Kategorie;
class KategorieBulk extends \Nemundo\Model\Data\AbstractModelDataBulk {
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

/**
* @var string
*/
public $regionId;

public function __construct() {
parent::__construct();
$this->model = new KategorieModel();
}
public function save() {
$this->typeValueList->setModelValue($this->model->kategorie, $this->kategorie);
$this->typeValueList->setModelValue($this->model->themaId, $this->themaId);
$this->typeValueList->setModelValue($this->model->isDeleted, $this->isDeleted);
$this->typeValueList->setModelValue($this->model->regionId, $this->regionId);
$id = parent::save();
return $id;
}
}