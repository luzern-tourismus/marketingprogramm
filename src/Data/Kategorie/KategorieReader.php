<?php
namespace LuzernTourismus\MarketingProgramm\Data\Kategorie;
class KategorieReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var KategorieModel
*/
public $model;

public function __construct() {
$this->model = new KategorieModel();
parent::__construct();
}
/**
* @return KategorieRow[]
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
* @return KategorieRow
*/
public function getRow() {
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return KategorieRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new KategorieRow($dataRow, $this->model, $this->multiLanguage);
$row->model = $this->model;
return $row;
}
}