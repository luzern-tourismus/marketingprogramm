<?php
namespace LuzernTourismus\MarketingProgramm\Data\ChangeLogType;
class ChangeLogTypeDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var ChangeLogTypeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ChangeLogTypeModel();
}
}