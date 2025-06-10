<?php

namespace LuzernTourismus\MarketingProgramm\Com\Form;

use LuzernTourismus\MarketingProgramm\Business\Aktivitaet\AktivitaetBuilder;
use LuzernTourismus\MarketingProgramm\Data\Option\OptionModel;
use Nemundo\Admin\Com\Form\AbstractAdminForm;
use Nemundo\Admin\Com\ListBox\AdminTextBox;

class OptionForm extends AbstractAdminForm
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

    public function getContent()
    {

        $model = new OptionModel();


        $this->option = new AdminTextBox($this);
        $this->option->label = $model->option->label;
        $this->option->validation = true;
        //$this->aktivitaet->required = true;

        $this->preis = new AdminTextBox($this);
        $this->preis->label = $model->preis->label;


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


    protected function onSubmit()
    {


        $builder = new AktivitaetBuilder($this->aktivitaetId);
        $builder->addOption($this->option->getValue(), $this->preis->getValue());

    }

}