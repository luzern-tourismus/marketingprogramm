<?php
namespace LuzernTourismus\MarketingProgramm\Data\Aktivitaet;
use Nemundo\Model\Id\AbstractModelIdValue;
class AktivitaetId extends AbstractModelIdValue {
/**
* @var AktivitaetModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new AktivitaetModel();
}
}