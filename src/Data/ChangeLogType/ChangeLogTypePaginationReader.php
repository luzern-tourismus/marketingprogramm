<?php
namespace LuzernTourismus\MarketingProgramm\Data\ChangeLogType;
class ChangeLogTypePaginationReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
/**
* @var ChangeLogTypeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ChangeLogTypeModel();
}
/**
* @return ChangeLogTypeRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new ChangeLogTypeRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}