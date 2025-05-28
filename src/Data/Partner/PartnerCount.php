<?php
namespace LuzernTourismus\MarketingProgramm\Data\Partner;
class PartnerCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var PartnerModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new PartnerModel();
}
}