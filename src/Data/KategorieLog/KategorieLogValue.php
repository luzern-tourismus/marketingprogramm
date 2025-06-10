<?php
namespace LuzernTourismus\MarketingProgramm\Data\KategorieLog;
class KategorieLogValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var KategorieLogModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new KategorieLogModel();
}
}