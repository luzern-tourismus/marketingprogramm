<?php
namespace LuzernTourismus\MarketingProgramm\Data\Partner;
class PartnerRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var PartnerModel
*/
public $model;

/**
* @var string
*/
public $id;

/**
* @var string
*/
public $firma;

/**
* @var bool
*/
public $isDeleted;

/**
* @var string
*/
public $strasse;

/**
* @var int
*/
public $plz;

/**
* @var string
*/
public $ort;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model, $multiLanguage = false) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->firma = $this->getModelValue($model->firma);
$this->isDeleted = boolval($this->getModelValue($model->isDeleted));
$this->strasse = $this->getModelValue($model->strasse);
$this->plz = intval($this->getModelValue($model->plz));
$this->ort = $this->getModelValue($model->ort);
}
}