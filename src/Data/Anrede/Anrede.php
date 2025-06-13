<?php
namespace LuzernTourismus\MarketingProgramm\Data\Anrede;
class Anrede extends \Nemundo\Model\Data\AbstractModelData {
/**
* @var AnredeModel
*/
protected $model;

/**
* @var int
*/
public $id;

/**
* @var string
*/
public $anrede;

public function __construct() {
parent::__construct();
$this->model = new AnredeModel();
}
public function save() {
$id = $this->id;
$this->typeValueList->setModelValue($this->model->id, $id);
$this->typeValueList->setModelValue($this->model->anrede, $this->anrede);
$id = parent::save();
return $id;
}
}