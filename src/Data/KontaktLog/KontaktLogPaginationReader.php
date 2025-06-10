<?php
namespace LuzernTourismus\MarketingProgramm\Data\KontaktLog;
class KontaktLogPaginationReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
/**
* @var KontaktLogModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new KontaktLogModel();
}
/**
* @return KontaktLogRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new KontaktLogRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}