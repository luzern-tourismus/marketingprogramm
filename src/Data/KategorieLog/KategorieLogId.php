<?php
namespace LuzernTourismus\MarketingProgramm\Data\KategorieLog;
use Nemundo\Model\Id\AbstractModelIdValue;
class KategorieLogId extends AbstractModelIdValue {
/**
* @var KategorieLogModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new KategorieLogModel();
}
}