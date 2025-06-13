<?php
namespace LuzernTourismus\MarketingProgramm\Data\Anrede;
class AnredeValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var AnredeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new AnredeModel();
}
}