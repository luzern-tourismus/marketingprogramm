<?php
namespace LuzernTourismus\MarketingProgramm\Data\KontaktLog;
class KontaktLogDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var KontaktLogModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new KontaktLogModel();
}
}