<?php
namespace LuzernTourismus\MarketingProgramm\Data\Aktivitaet;
class AktivitaetDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var AktivitaetModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new AktivitaetModel();
}
}