<?php
namespace LuzernTourismus\MarketingProgramm\Data\Kategorie;
use Nemundo\Model\Id\AbstractModelIdValue;
class KategorieId extends AbstractModelIdValue {
/**
* @var KategorieModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new KategorieModel();
}
}