<?php
namespace LuzernTourismus\MarketingProgramm\Data\Thema;
class ThemaValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var ThemaModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ThemaModel();
}
}