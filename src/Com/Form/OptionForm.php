<?php

namespace LuzernTourismus\MarketingProgramm\Com\Form;

use LuzernTourismus\MarketingProgramm\Business\Aktivitaet\AktivitaetBuilder;
use LuzernTourismus\MarketingProgramm\Com\Table\AktivitaetLabelValueTable;
use LuzernTourismus\MarketingProgramm\Data\Aktivitaet\AktivitaetRow;
use LuzernTourismus\MarketingProgramm\Data\Option\OptionModel;
use LuzernTourismus\MarketingProgramm\Data\Option\OptionReader;
use LuzernTourismus\MarketingProgramm\Data\Option\OptionUpdate;
use LuzernTourismus\MarketingProgramm\Reader\Aktivitaet\AktivitaetDataReader;
use LuzernTourismus\MarketingProgramm\Reader\Option\OptionDataReader;
use Nemundo\Admin\Com\Form\AbstractAdminEditForm;
use Nemundo\Admin\Com\ListBox\AdminNumberBox;
use Nemundo\Admin\Com\ListBox\AdminTextBox;
use Nemundo\Core\Validation\NumberValidation;

class OptionForm extends AbstractAdminEditForm
{

    public $aktivitaetId;

    /**
     * @var AdminTextBox
     */
    private $option;

    /**
     * @var AdminTextBox
     */
    private $preis;

    /**
     * @var AdminNumberBox
     */
    private $itemOrder;


    public function getContent()
    {

        //$optionRow = (new OptionDataReader())->getRowById($this->dataId);
        //$aktivitaetRow = $optionRow->aktivitaet;  // -> (new AktivitaetDataReader())->getRowById($this->aktivitaetId);




        $model = new OptionModel();

        $this->option = new AdminTextBox($this);
        $this->option->label = $model->option->label;
        $this->option->validation = true;

        $this->preis = new AdminTextBox($this);
        $this->preis->label = $model->preis->label;

        return parent::getContent();

    }


    protected function loadUpdateForm()
    {

        $model = new OptionModel();

        $optionRow = (new OptionReader())->getRowById($this->dataId);

        $this->option->value = $optionRow->option;
        $this->preis->value = $optionRow->preis;

        $this->itemOrder = new AdminNumberBox($this);
        $this->itemOrder->label = $model->itemOrder->label;
        $this->itemOrder->value = $optionRow->itemOrder;

    }

    protected function onSave()
    {

        $builder = new AktivitaetBuilder($this->aktivitaetId);
        $builder->addOption($this->option->getValue(), $this->preis->getValue());

    }


    protected function onUpdate()
    {

        $update = new OptionUpdate();
        $update->option = $this->option->getValue();


        $preis = $this->preis->getValue();
        if ((new NumberValidation())->isNumber($preis)) {
            $update->hasPreis = true;
            $update->preis = $preis;
        } else {
            $update->hasPreis = false;
        }

        $update->itemOrder = $this->itemOrder->getValue();
        $update->updateById($this->dataId);

    }

}