<?php
namespace LuzernTourismus\MarketingProgramm\Data\PartnerMitarbeiter;
class PartnerMitarbeiterCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var PartnerMitarbeiterModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new PartnerMitarbeiterModel();
}
}