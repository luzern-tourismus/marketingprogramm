<?php
namespace LuzernTourismus\MarketingProgramm\Data\ChangeLogOperation;
class ChangeLogOperationCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var ChangeLogOperationModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ChangeLogOperationModel();
}
}