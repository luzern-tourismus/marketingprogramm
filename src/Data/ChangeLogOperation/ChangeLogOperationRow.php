<?php
namespace LuzernTourismus\MarketingProgramm\Data\ChangeLogOperation;
class ChangeLogOperationRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var ChangeLogOperationModel
*/
public $model;

/**
* @var string
*/
public $id;

/**
* @var string
*/
public $operation;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model, $multiLanguage = false) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->operation = $this->getModelValue($model->operation);
}
}