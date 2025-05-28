<?php
namespace LuzernTourismus\MarketingProgramm\Data\AktivitaetChangeLog;
class AktivitaetChangeLogPaginationReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
/**
* @var AktivitaetChangeLogModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new AktivitaetChangeLogModel();
}
/**
* @return AktivitaetChangeLogRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new AktivitaetChangeLogRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}