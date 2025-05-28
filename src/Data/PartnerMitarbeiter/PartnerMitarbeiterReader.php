<?php
namespace LuzernTourismus\MarketingProgramm\Data\PartnerMitarbeiter;
class PartnerMitarbeiterReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var PartnerMitarbeiterModel
*/
public $model;

public function __construct() {
$this->model = new PartnerMitarbeiterModel();
parent::__construct();
}
/**
* @return PartnerMitarbeiterRow[]
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
* @return PartnerMitarbeiterRow
*/
public function getRow() {
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return PartnerMitarbeiterRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new PartnerMitarbeiterRow($dataRow, $this->model, $this->multiLanguage);
$row->model = $this->model;
return $row;
}
}