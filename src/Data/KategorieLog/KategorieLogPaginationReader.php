<?php
namespace LuzernTourismus\MarketingProgramm\Data\KategorieLog;
class KategorieLogPaginationReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
/**
* @var KategorieLogModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new KategorieLogModel();
}
/**
* @return KategorieLogRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new KategorieLogRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}