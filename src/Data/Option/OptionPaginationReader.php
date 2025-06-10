<?php
namespace LuzernTourismus\MarketingProgramm\Data\Option;
class OptionPaginationReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
/**
* @var OptionModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new OptionModel();
}
/**
* @return \LuzernTourismus\MarketingProgramm\Reader\Option\OptionDataRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new \LuzernTourismus\MarketingProgramm\Reader\Option\OptionDataRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}