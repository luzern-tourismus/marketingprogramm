<?php
namespace LuzernTourismus\MarketingProgramm\Data\Kontakt;
class KontaktRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var KontaktModel
*/
public $model;

/**
* @var string
*/
public $id;

/**
* @var string
*/
public $name;

/**
* @var string
*/
public $vorname;

/**
* @var string
*/
public $email;

/**
* @var string
*/
public $telefon;

/**
* @var bool
*/
public $isDeleted;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model, $multiLanguage = false) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->name = $this->getModelValue($model->name);
$this->vorname = $this->getModelValue($model->vorname);
$this->email = $this->getModelValue($model->email);
$this->telefon = $this->getModelValue($model->telefon);
$this->isDeleted = boolval($this->getModelValue($model->isDeleted));
}
}