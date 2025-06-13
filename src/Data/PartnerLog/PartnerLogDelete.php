<?php
namespace LuzernTourismus\MarketingProgramm\Data\PartnerLog;
class PartnerLogDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var PartnerLogModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new PartnerLogModel();
}
}