<?php
namespace LuzernTourismus\MarketingProgramm\Data\Anmeldung;
class AnmeldungReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var AnmeldungModel
*/
public $model;

public function __construct() {
$this->model = new AnmeldungModel();
parent::__construct();
}
/**
* @return AnmeldungRow[]
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
* @return AnmeldungRow
*/
public function getRow() {
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return AnmeldungRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new AnmeldungRow($dataRow, $this->model, $this->multiLanguage);
$row->model = $this->model;
return $row;
}
}