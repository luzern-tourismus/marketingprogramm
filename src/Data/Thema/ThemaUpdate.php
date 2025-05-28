<?php
namespace LuzernTourismus\MarketingProgramm\Data\Thema;
use Nemundo\Model\Data\AbstractModelUpdate;
class ThemaUpdate extends AbstractModelUpdate {
/**
* @var ThemaModel
*/
public $model;

/**
* @var string
*/
public $thema;

public function __construct() {
parent::__construct();
$this->model = new ThemaModel();
}
public function update() {
$this->typeValueList->setModelValue($this->model->thema, $this->thema);
parent::update();
}
}