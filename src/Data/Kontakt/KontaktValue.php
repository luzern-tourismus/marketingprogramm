<?php
namespace LuzernTourismus\MarketingProgramm\Data\Kontakt;
class KontaktValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var KontaktModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new KontaktModel();
}
}