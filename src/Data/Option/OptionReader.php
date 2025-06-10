<?php
namespace LuzernTourismus\MarketingProgramm\Data\Option;
class OptionReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var OptionModel
*/
public $model;

public function __construct() {
$this->model = new OptionModel();
parent::__construct();
}
/**
* @return \LuzernTourismus\MarketingProgramm\Reader\Option\OptionDataRow[]
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
* @return \LuzernTourismus\MarketingProgramm\Reader\Option\OptionDataRow
*/
public function getRow() {
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return \LuzernTourismus\MarketingProgramm\Reader\Option\OptionDataRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new \LuzernTourismus\MarketingProgramm\Reader\Option\OptionDataRow($dataRow, $this->model, $this->multiLanguage);
$row->model = $this->model;
return $row;
}
}