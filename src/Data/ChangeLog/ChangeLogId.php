<?php
namespace LuzernTourismus\MarketingProgramm\Data\ChangeLog;
use Nemundo\Model\Id\AbstractModelIdValue;
class ChangeLogId extends AbstractModelIdValue {
/**
* @var ChangeLogModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ChangeLogModel();
}
}