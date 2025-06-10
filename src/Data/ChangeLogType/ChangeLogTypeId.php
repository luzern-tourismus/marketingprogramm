<?php
namespace LuzernTourismus\MarketingProgramm\Data\ChangeLogType;
use Nemundo\Model\Id\AbstractModelIdValue;
class ChangeLogTypeId extends AbstractModelIdValue {
/**
* @var ChangeLogTypeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ChangeLogTypeModel();
}
}