<?php
namespace LuzernTourismus\MarketingProgramm\Data\Partner;
class PartnerDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var PartnerModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new PartnerModel();
}
}