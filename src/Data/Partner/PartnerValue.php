<?php
namespace LuzernTourismus\MarketingProgramm\Data\Partner;
class PartnerValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var PartnerModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new PartnerModel();
}
}