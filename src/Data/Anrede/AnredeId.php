<?php
namespace LuzernTourismus\MarketingProgramm\Data\Anrede;
use Nemundo\Model\Id\AbstractModelIdValue;
class AnredeId extends AbstractModelIdValue {
/**
* @var AnredeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new AnredeModel();
}
}