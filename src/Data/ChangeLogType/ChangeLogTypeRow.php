<?php
namespace LuzernTourismus\MarketingProgramm\Data\ChangeLogType;
class ChangeLogTypeRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var ChangeLogTypeModel
*/
public $model;

/**
* @var string
*/
public $id;

/**
* @var string
*/
public $changeLogType;

/**
* @var string
*/
public $phpClass;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model, $multiLanguage = false) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->changeLogType = $this->getModelValue($model->changeLogType);
$this->phpClass = $this->getModelValue($model->phpClass);
}
}