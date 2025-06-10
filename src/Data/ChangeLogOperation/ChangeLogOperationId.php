<?php
namespace LuzernTourismus\MarketingProgramm\Data\ChangeLogOperation;
use Nemundo\Model\Id\AbstractModelIdValue;
class ChangeLogOperationId extends AbstractModelIdValue {
/**
* @var ChangeLogOperationModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ChangeLogOperationModel();
}
}