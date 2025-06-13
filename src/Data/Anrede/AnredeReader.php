<?php
namespace LuzernTourismus\MarketingProgramm\Data\Anrede;
class AnredeReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var AnredeModel
*/
public $model;

public function __construct() {
$this->model = new AnredeModel();
parent::__construct();
}
/**
* @return AnredeRow[]
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
* @return AnredeRow
*/
public function getRow() {
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return AnredeRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new AnredeRow($dataRow, $this->model, $this->multiLanguage);
$row->model = $this->model;
return $row;
}
}