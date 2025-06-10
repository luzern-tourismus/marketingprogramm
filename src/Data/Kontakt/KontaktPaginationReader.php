<?php
namespace LuzernTourismus\MarketingProgramm\Data\Kontakt;
class KontaktPaginationReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
/**
* @var KontaktModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new KontaktModel();
}
/**
* @return \LuzernTourismus\MarketingProgramm\Reader\Kontakt\KontaktDataRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new \LuzernTourismus\MarketingProgramm\Reader\Kontakt\KontaktDataRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}