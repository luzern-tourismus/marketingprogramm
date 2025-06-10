<?php
namespace LuzernTourismus\MarketingProgramm\Data\ChangeLog;
class ChangeLogCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var ChangeLogModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ChangeLogModel();
}
}