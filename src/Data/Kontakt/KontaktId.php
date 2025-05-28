<?php
namespace LuzernTourismus\MarketingProgramm\Data\Kontakt;
use Nemundo\Model\Id\AbstractModelIdValue;
class KontaktId extends AbstractModelIdValue {
/**
* @var KontaktModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new KontaktModel();
}
}