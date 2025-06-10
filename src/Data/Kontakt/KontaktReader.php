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
* @return \LuzernTourismus\MarketingProgramm\Reader\Kontakt\KontaktDataRow[]
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
* @return \LuzernTourismus\MarketingProgramm\Reader\Kontakt\KontaktDataRow
*/
public function getRow() {
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return \LuzernTourismus\MarketingProgramm\Reader\Kontakt\KontaktDataRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new \LuzernTourismus\MarketingProgramm\Reader\Kontakt\KontaktDataRow($dataRow, $this->model, $this->multiLanguage);
$row->model = $this->model;
return $row;
}
}