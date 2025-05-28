<?php
namespace LuzernTourismus\MarketingProgramm\Data\Kategorie;
class KategoriePaginationReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
/**
* @var KategorieModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new KategorieModel();
}
/**
* @return KategorieRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new KategorieRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}