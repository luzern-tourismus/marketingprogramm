<?php
namespace LuzernTourismus\MarketingProgramm\Data\RegionLog;
class RegionLogDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var RegionLogModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new RegionLogModel();
}
}