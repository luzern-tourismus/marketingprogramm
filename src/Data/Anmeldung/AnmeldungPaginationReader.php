<?php
namespace LuzernTourismus\MarketingProgramm\Data\Anmeldung;
class AnmeldungPaginationReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
/**
* @var AnmeldungModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new AnmeldungModel();
}
/**
* @return AnmeldungRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new AnmeldungRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}