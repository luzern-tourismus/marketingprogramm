<?php
namespace LuzernTourismus\MarketingProgramm\Data\Thema;
use Nemundo\Model\Id\AbstractModelIdValue;
class ThemaId extends AbstractModelIdValue {
/**
* @var ThemaModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ThemaModel();
}
}