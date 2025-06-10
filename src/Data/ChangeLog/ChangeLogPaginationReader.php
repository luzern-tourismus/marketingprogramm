<?php
namespace LuzernTourismus\MarketingProgramm\Data\ChangeLog;
class ChangeLogPaginationReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
/**
* @var ChangeLogModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ChangeLogModel();
}
/**
* @return ChangeLogRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new ChangeLogRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}