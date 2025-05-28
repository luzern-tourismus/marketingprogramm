<?php
namespace LuzernTourismus\MarketingProgramm\Data\Aktivitaet;
class AktivitaetValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var AktivitaetModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new AktivitaetModel();
}
}