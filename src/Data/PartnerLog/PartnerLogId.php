<?php
namespace LuzernTourismus\MarketingProgramm\Data\PartnerLog;
use Nemundo\Model\Id\AbstractModelIdValue;
class PartnerLogId extends AbstractModelIdValue {
/**
* @var PartnerLogModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new PartnerLogModel();
}
}