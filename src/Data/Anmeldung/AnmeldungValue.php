<?php
namespace LuzernTourismus\MarketingProgramm\Data\Anmeldung;
class AnmeldungValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var AnmeldungModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new AnmeldungModel();
}
}