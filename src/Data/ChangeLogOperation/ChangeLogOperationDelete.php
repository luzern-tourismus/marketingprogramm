<?php
namespace LuzernTourismus\MarketingProgramm\Data\ChangeLogOperation;
class ChangeLogOperationDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var ChangeLogOperationModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ChangeLogOperationModel();
}
}