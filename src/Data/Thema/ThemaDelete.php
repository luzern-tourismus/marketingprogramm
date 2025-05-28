<?php
namespace LuzernTourismus\MarketingProgramm\Data\Thema;
class ThemaDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var ThemaModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ThemaModel();
}
}