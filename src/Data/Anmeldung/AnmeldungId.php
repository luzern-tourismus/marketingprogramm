<?php
namespace LuzernTourismus\MarketingProgramm\Data\Anmeldung;
use Nemundo\Model\Id\AbstractModelIdValue;
class AnmeldungId extends AbstractModelIdValue {
/**
* @var AnmeldungModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new AnmeldungModel();
}
}