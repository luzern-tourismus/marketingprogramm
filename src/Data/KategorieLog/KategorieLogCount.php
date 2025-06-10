<?php
namespace LuzernTourismus\MarketingProgramm\Data\KategorieLog;
class KategorieLogCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var KategorieLogModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new KategorieLogModel();
}
}