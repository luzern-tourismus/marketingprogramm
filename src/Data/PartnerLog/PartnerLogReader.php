<?php
namespace LuzernTourismus\MarketingProgramm\Data\PartnerLog;
class PartnerLogReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var PartnerLogModel
*/
public $model;

public function __construct() {
$this->model = new PartnerLogModel();
parent::__construct();
}
/**
* @return PartnerLogRow[]
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
* @return PartnerLogRow
*/
public function getRow() {
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return PartnerLogRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new PartnerLogRow($dataRow, $this->model, $this->multiLanguage);
$row->model = $this->model;
return $row;
}
}