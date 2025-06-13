<?php
namespace LuzernTourismus\MarketingProgramm\Data\Anrede;
class AnredeDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var AnredeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new AnredeModel();
}
}