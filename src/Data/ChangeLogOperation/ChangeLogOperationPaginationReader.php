<?php
namespace LuzernTourismus\MarketingProgramm\Data\ChangeLogOperation;
class ChangeLogOperationPaginationReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
/**
* @var ChangeLogOperationModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ChangeLogOperationModel();
}
/**
* @return ChangeLogOperationRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new ChangeLogOperationRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}