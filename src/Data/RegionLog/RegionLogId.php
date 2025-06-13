<?php
namespace LuzernTourismus\MarketingProgramm\Data\RegionLog;
use Nemundo\Model\Id\AbstractModelIdValue;
class RegionLogId extends AbstractModelIdValue {
/**
* @var RegionLogModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new RegionLogModel();
}
}