<?php
namespace LuzernTourismus\MarketingProgramm\Data\Kategorie;
class KategorieCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var KategorieModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new KategorieModel();
}
}