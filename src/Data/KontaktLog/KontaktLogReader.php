<?php
namespace LuzernTourismus\MarketingProgramm\Data\KontaktLog;
class KontaktLogReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var KontaktLogModel
*/
public $model;

public function __construct() {
$this->model = new KontaktLogModel();
parent::__construct();
}
/**
* @return KontaktLogRow[]
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
* @return KontaktLogRow
*/
public function getRow() {
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return KontaktLogRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new KontaktLogRow($dataRow, $this->model, $this->multiLanguage);
$row->model = $this->model;
return $row;
}
}