<?php
namespace LuzernTourismus\MarketingProgramm\Data\Thema;
class Thema extends \Nemundo\Model\Data\AbstractModelData {
/**
* @var ThemaModel
*/
protected $model;

/**
* @var int
*/
public $id;

/**
* @var string
*/
public $thema;

public function __construct() {
parent::__construct();
$this->model = new ThemaModel();
}
public function save() {
$id = $this->id;
$this->typeValueList->setModelValue($this->model->id, $id);
$this->typeValueList->setModelValue($this->model->thema, $this->thema);
$id = parent::save();
return $id;
}
}