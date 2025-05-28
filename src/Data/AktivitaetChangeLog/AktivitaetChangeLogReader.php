<?php
namespace LuzernTourismus\MarketingProgramm\Data\AktivitaetChangeLog;
class AktivitaetChangeLogReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var AktivitaetChangeLogModel
*/
public $model;

public function __construct() {
$this->model = new AktivitaetChangeLogModel();
parent::__construct();
}
/**
* @return AktivitaetChangeLogRow[]
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
* @return AktivitaetChangeLogRow
*/
public function getRow() {
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return AktivitaetChangeLogRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new AktivitaetChangeLogRow($dataRow, $this->model, $this->multiLanguage);
$row->model = $this->model;
return $row;
}
}