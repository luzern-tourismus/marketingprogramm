<?php
namespace LuzernTourismus\MarketingProgramm\Data\PartnerMitarbeiter;
use Nemundo\Model\Id\AbstractModelIdValue;
class PartnerMitarbeiterId extends AbstractModelIdValue {
/**
* @var PartnerMitarbeiterModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new PartnerMitarbeiterModel();
}
}