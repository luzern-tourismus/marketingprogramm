<?php
namespace LuzernTourismus\MarketingProgramm\Data\Anmeldung;
class AnmeldungCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var AnmeldungModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new AnmeldungModel();
}
}