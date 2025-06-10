<?php
namespace LuzernTourismus\MarketingProgramm\Data\KategorieLog;
class KategorieLogReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var KategorieLogModel
*/
public $model;

public function __construct() {
$this->model = new KategorieLogModel();
parent::__construct();
}
/**
* @return KategorieLogRow[]
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
* @return KategorieLogRow
*/
public function getRow() {
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return KategorieLogRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new KategorieLogRow($dataRow, $this->model, $this->multiLanguage);
$row->model = $this->model;
return $row;
}
}