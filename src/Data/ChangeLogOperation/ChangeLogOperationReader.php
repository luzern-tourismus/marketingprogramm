<?php
namespace LuzernTourismus\MarketingProgramm\Data\ChangeLogOperation;
class ChangeLogOperationReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var ChangeLogOperationModel
*/
public $model;

public function __construct() {
$this->model = new ChangeLogOperationModel();
parent::__construct();
}
/**
* @return ChangeLogOperationRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = $this->getModelRow($dataRow);
$list[] = $row;
}
return $list;
}
/**
* @return ChangeLogOperationRow
*/
public function getRow() {
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return ChangeLogOperationRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new ChangeLogOperationRow($dataRow, $this->model, $this->multiLanguage);
$row->model = $this->model;
return $row;
}
}