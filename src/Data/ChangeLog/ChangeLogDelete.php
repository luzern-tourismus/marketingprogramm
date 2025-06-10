<?php
namespace LuzernTourismus\MarketingProgramm\Data\ChangeLog;
class ChangeLogDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var ChangeLogModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ChangeLogModel();
}
}