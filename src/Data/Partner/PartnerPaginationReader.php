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
* @return \LuzernTourismus\MarketingProgramm\Reader\Partner\PartnerDataRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new \LuzernTourismus\MarketingProgramm\Reader\Partner\PartnerDataRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}