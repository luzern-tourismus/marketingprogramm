<?php
namespace LuzernTourismus\MarketingProgramm\Data\Kategorie;
class KategorieDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var KategorieModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new KategorieModel();
}
}