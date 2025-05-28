<?php
namespace LuzernTourismus\MarketingProgramm\Data\Kontakt;
class KontaktReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var KontaktModel
*/
public $model;

public function __construct() {
$this->model = new KontaktModel();
parent::__construct();
}
/**
* @return KontaktRow[]
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
* @return KontaktRow
*/
public function getRow() {
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return KontaktRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new KontaktRow($dataRow, $this->model, $this->multiLanguage);
$row->model = $this->model;
return $row;
}
}