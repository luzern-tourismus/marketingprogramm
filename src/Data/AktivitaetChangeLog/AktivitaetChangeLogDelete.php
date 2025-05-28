<?php
namespace LuzernTourismus\MarketingProgramm\Data\AktivitaetChangeLog;
class AktivitaetChangeLogDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var AktivitaetChangeLogModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new AktivitaetChangeLogModel();
}
}