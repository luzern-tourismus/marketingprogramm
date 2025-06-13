<?php

namespace LuzernTourismus\MarketingProgramm\Com\Form;

use LuzernTourismus\MarketingProgramm\Business\Aktivitaet\AktivitaetBuilder;
use LuzernTourismus\MarketingProgramm\Data\Option\OptionModel;
use LuzernTourismus\MarketingProgramm\Data\Option\OptionReader;
use LuzernTourismus\MarketingProgramm\Data\Option\OptionUpdate;
use Nemundo\Admin\Com\Form\AbstractAdminEditForm;
use Nemundo\Admin\Com\Form\AbstractAdminForm;
use Nemundo\Admin\Com\ListBox\AdminNumberBox;
use Nemundo\Admin\Com\ListBox\AdminTextBox;

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

        $model = new OptionModel();


        $this->option = new AdminTextBox($this);
        $this->option->label = $model->option->label;
        $this->option->validation = true;

        $this->preis = new AdminTextBox($this);
        $this->preis->label = $model->preis->label;

        /*$this->itemOrder = new AdminNumberBox($this);
        $this->itemOrder->label = $model->itemOrder->label;*/


        /*
        if ($this->aktivitaetId!==null) {

            $aktivitaetRow = (new AktivitaetReader())->getRowById($this->aktivitaetId);

            $this->option->value = $aktivitaetRow->aktivitaet;
            $this->preis->value = $aktivitaetRow->datum;
            $this->kosten->value = $aktivitaetRow->kosten;
            $this->leistung->value = $aktivitaetRow->leistung;
            $this->zielpublikum->value = $aktivitaetRow->zielpublikum;
            $this->kategorie->value = $aktivitaetRow->kategorieId;
            $this->kontakt->value = $aktivitaetRow->kontaktId;

        }*/


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
        $update->preis = $this->preis->getValue();
        $update->itemOrder = $this->itemOrder->getValue();
        $update->updateById($this->dataId);

    }

}