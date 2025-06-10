<?php
namespace LuzernTourismus\MarketingProgramm\Data\KontaktLog;
class KontaktLogCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var KontaktLogModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new KontaktLogModel();
}
}