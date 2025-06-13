<?php
namespace LuzernTourismus\MarketingProgramm\Data\RegionLog;
class RegionLogReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var RegionLogModel
*/
public $model;

public function __construct() {
$this->model = new RegionLogModel();
parent::__construct();
}
/**
* @return RegionLogRow[]
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
* @return RegionLogRow
*/
public function getRow() {
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return RegionLogRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new RegionLogRow($dataRow, $this->model, $this->multiLanguage);
$row->model = $this->model;
return $row;
}
}