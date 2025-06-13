<?php
namespace LuzernTourismus\MarketingProgramm\Data\PartnerLog;
class PartnerLogCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var PartnerLogModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new PartnerLogModel();
}
}