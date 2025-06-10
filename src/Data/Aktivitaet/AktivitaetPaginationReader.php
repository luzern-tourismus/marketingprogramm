<?php
namespace LuzernTourismus\MarketingProgramm\Data\Aktivitaet;
class AktivitaetPaginationReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
/**
* @var AktivitaetModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new AktivitaetModel();
}
/**
* @return \LuzernTourismus\MarketingProgramm\Reader\Aktivitaet\AktivitaetDataRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new \LuzernTourismus\MarketingProgramm\Reader\Aktivitaet\AktivitaetDataRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}