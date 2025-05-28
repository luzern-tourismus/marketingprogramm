<?php
namespace LuzernTourismus\MarketingProgramm\Data\Kontakt;
class KontaktCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var KontaktModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new KontaktModel();
}
}