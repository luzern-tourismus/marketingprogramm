<?php
namespace LuzernTourismus\MarketingProgramm\Data\Anmeldung;
class AnmeldungDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var AnmeldungModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new AnmeldungModel();
}
}