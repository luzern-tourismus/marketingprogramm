<?php
namespace LuzernTourismus\MarketingProgramm\Data\RegionLog;
class RegionLogPaginationReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
/**
* @var RegionLogModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new RegionLogModel();
}
/**
* @return RegionLogRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new RegionLogRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}