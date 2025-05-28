<?php
namespace LuzernTourismus\MarketingProgramm\Data\PartnerMitarbeiter;
class PartnerMitarbeiterValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var PartnerMitarbeiterModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new PartnerMitarbeiterModel();
}
}