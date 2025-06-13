<?php
namespace LuzernTourismus\MarketingProgramm\Data\PartnerLog;
class PartnerLogPaginationReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
/**
* @var PartnerLogModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new PartnerLogModel();
}
/**
* @return PartnerLogRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new PartnerLogRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}