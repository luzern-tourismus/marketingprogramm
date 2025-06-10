<?php
namespace LuzernTourismus\MarketingProgramm\Data\ChangeLogType;
class ChangeLogTypeReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var ChangeLogTypeModel
*/
public $model;

public function __construct() {
$this->model = new ChangeLogTypeModel();
parent::__construct();
}
/**
* @return ChangeLogTypeRow[]
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
* @return ChangeLogTypeRow
*/
public function getRow() {
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return ChangeLogTypeRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new ChangeLogTypeRow($dataRow, $this->model, $this->multiLanguage);
$row->model = $this->model;
return $row;
}
}