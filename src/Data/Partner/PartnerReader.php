<?php
namespace LuzernTourismus\MarketingProgramm\Data\Partner;
class PartnerReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var PartnerModel
*/
public $model;

public function __construct() {
$this->model = new PartnerModel();
parent::__construct();
}
/**
* @return PartnerRow[]
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
* @return PartnerRow
*/
public function getRow() {
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return PartnerRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new PartnerRow($dataRow, $this->model, $this->multiLanguage);
$row->model = $this->model;
return $row;
}
}