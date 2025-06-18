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
* @return \LuzernTourismus\MarketingProgramm\Reader\PartnerMitarbeiter\PartnerMitarbeiterDataRow[]
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
* @return \LuzernTourismus\MarketingProgramm\Reader\PartnerMitarbeiter\PartnerMitarbeiterDataRow
*/
public function getRow() {
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return \LuzernTourismus\MarketingProgramm\Reader\PartnerMitarbeiter\PartnerMitarbeiterDataRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new \LuzernTourismus\MarketingProgramm\Reader\PartnerMitarbeiter\PartnerMitarbeiterDataRow($dataRow, $this->model, $this->multiLanguage);
$row->model = $this->model;
return $row;
}
}