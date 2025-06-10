<?php
namespace LuzernTourismus\MarketingProgramm\Data\KontaktLog;
use Nemundo\Model\Id\AbstractModelIdValue;
class KontaktLogId extends AbstractModelIdValue {
/**
* @var KontaktLogModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new KontaktLogModel();
}
}