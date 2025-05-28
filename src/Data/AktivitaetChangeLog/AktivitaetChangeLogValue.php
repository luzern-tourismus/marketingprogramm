<?php
namespace LuzernTourismus\MarketingProgramm\Data\AktivitaetChangeLog;
class AktivitaetChangeLogValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var AktivitaetChangeLogModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new AktivitaetChangeLogModel();
}
}