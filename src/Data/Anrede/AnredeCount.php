<?php
namespace LuzernTourismus\MarketingProgramm\Data\Anrede;
class AnredeCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var AnredeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new AnredeModel();
}
}