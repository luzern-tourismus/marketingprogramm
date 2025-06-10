<?php
namespace LuzernTourismus\MarketingProgramm\Data\ChangeLogType;
class ChangeLogTypeCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var ChangeLogTypeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ChangeLogTypeModel();
}
}