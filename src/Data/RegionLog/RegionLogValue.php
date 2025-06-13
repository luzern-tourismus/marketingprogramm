<?php
namespace LuzernTourismus\MarketingProgramm\Data\RegionLog;
class RegionLogValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var RegionLogModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new RegionLogModel();
}
}