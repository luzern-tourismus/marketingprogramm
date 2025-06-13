<?php
namespace LuzernTourismus\MarketingProgramm\Data\Anrede;
use Nemundo\Model\Data\AbstractModelUpdate;
class AnredeUpdate extends AbstractModelUpdate {
/**
* @var AnredeModel
*/
public $model;

/**
* @var string
*/
public $anrede;

public function __construct() {
parent::__construct();
$this->model = new AnredeModel();
}
public function update() {
$this->typeValueList->setModelValue($this->model->anrede, $this->anrede);
parent::update();
}
}