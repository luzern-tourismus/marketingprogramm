<?php
namespace LuzernTourismus\MarketingProgramm\Data\RegionLog;
class RegionLogCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var RegionLogModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new RegionLogModel();
}
}