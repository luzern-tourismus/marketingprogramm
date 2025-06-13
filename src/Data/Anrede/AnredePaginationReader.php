<?php
namespace LuzernTourismus\MarketingProgramm\Data\Anrede;
class AnredePaginationReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
/**
* @var AnredeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new AnredeModel();
}
/**
* @return AnredeRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new AnredeRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}