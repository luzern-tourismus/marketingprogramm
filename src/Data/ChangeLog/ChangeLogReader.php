<?php
namespace LuzernTourismus\MarketingProgramm\Data\ChangeLog;
class ChangeLogReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var ChangeLogModel
*/
public $model;

public function __construct() {
$this->model = new ChangeLogModel();
parent::__construct();
}
/**
* @return ChangeLogRow[]
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
* @return ChangeLogRow
*/
public function getRow() {
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return ChangeLogRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new ChangeLogRow($dataRow, $this->model, $this->multiLanguage);
$row->model = $this->model;
return $row;
}
}