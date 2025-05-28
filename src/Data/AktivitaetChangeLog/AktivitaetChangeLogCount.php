<?php
namespace LuzernTourismus\MarketingProgramm\Data\AktivitaetChangeLog;
class AktivitaetChangeLogCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var AktivitaetChangeLogModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new AktivitaetChangeLogModel();
}
}