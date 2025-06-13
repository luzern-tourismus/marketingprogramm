<?php
namespace LuzernTourismus\MarketingProgramm\Data\PartnerLog;
class PartnerLogValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var PartnerLogModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new PartnerLogModel();
}
}