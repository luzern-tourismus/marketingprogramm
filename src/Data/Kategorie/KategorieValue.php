<?php
namespace LuzernTourismus\MarketingProgramm\Data\Kategorie;
class KategorieValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var KategorieModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new KategorieModel();
}
}