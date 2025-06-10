<?php
namespace LuzernTourismus\MarketingProgramm\Data\KontaktLog;
class KontaktLogValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var KontaktLogModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new KontaktLogModel();
}
}