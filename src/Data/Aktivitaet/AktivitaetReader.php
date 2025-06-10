<?php
namespace LuzernTourismus\MarketingProgramm\Data\Aktivitaet;
class AktivitaetReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var AktivitaetModel
*/
public $model;

public function __construct() {
$this->model = new AktivitaetModel();
parent::__construct();
}
/**
* @return \LuzernTourismus\MarketingProgramm\Reader\Aktivitaet\AktivitaetDataRow[]
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
* @return \LuzernTourismus\MarketingProgramm\Reader\Aktivitaet\AktivitaetDataRow
*/
public function getRow() {
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return \LuzernTourismus\MarketingProgramm\Reader\Aktivitaet\AktivitaetDataRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new \LuzernTourismus\MarketingProgramm\Reader\Aktivitaet\AktivitaetDataRow($dataRow, $this->model, $this->multiLanguage);
$row->model = $this->model;
return $row;
}
}