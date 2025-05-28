<?php
namespace LuzernTourismus\MarketingProgramm\Data\Partner;
class PartnerPaginationReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
/**
* @var PartnerModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new PartnerModel();
}
/**
* @return PartnerRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new PartnerRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}