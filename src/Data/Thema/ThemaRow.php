<?php
namespace LuzernTourismus\MarketingProgramm\Data\Thema;
class ThemaRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var ThemaModel
*/
public $model;

/**
* @var string
*/
public $id;

/**
* @var string
*/
public $thema;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model, $multiLanguage = false) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->thema = $this->getModelValue($model->thema);
}
}