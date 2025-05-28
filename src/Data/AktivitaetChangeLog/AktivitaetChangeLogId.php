<?php
namespace LuzernTourismus\MarketingProgramm\Data\AktivitaetChangeLog;
use Nemundo\Model\Id\AbstractModelIdValue;
class AktivitaetChangeLogId extends AbstractModelIdValue {
/**
* @var AktivitaetChangeLogModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new AktivitaetChangeLogModel();
}
}