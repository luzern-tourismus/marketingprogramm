<?php
namespace LuzernTourismus\MarketingProgramm\Data\Aktivitaet;
class AktivitaetCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var AktivitaetModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new AktivitaetModel();
}
}