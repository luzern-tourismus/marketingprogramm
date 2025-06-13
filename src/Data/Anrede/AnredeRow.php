<?php
namespace LuzernTourismus\MarketingProgramm\Data\Anrede;
class AnredeRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var AnredeModel
*/
public $model;

/**
* @var string
*/
public $id;

/**
* @var string
*/
public $anrede;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model, $multiLanguage = false) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->anrede = $this->getModelValue($model->anrede);
}
}