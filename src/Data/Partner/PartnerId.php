<?php
namespace LuzernTourismus\MarketingProgramm\Data\Partner;
use Nemundo\Model\Id\AbstractModelIdValue;
class PartnerId extends AbstractModelIdValue {
/**
* @var PartnerModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new PartnerModel();
}
}