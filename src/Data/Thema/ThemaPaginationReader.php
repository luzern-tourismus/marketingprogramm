<?php
namespace LuzernTourismus\MarketingProgramm\Data\Thema;
class ThemaPaginationReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
/**
* @var ThemaModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ThemaModel();
}
/**
* @return ThemaRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new ThemaRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}