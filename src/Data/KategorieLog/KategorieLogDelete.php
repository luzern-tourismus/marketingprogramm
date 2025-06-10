<?php
namespace LuzernTourismus\MarketingProgramm\Data\KategorieLog;
class KategorieLogDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var KategorieLogModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new KategorieLogModel();
}
}