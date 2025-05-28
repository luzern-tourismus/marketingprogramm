<?php
namespace LuzernTourismus\MarketingProgramm\Data\Thema;
class ThemaCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var ThemaModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ThemaModel();
}
}