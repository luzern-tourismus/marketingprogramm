<?php
namespace LuzernTourismus\MarketingProgramm\Data\PartnerMitarbeiter;
class PartnerMitarbeiterPaginationReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
/**
* @var PartnerMitarbeiterModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new PartnerMitarbeiterModel();
}
/**
* @return PartnerMitarbeiterRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new PartnerMitarbeiterRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}