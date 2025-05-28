<?php
namespace LuzernTourismus\MarketingProgramm\Data\Kontakt;
class KontaktDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var KontaktModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new KontaktModel();
}
}