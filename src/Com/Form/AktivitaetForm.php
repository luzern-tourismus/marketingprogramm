<?php

namespace LuzernTourismus\MarketingProgramm\Com\Form;

use LuzernTourismus\MarketingProgramm\Business\Aktivitaet\AktivitaetBuilder;
use LuzernTourismus\MarketingProgramm\Com\ListBox\KategorieListBox;
use LuzernTourismus\MarketingProgramm\Com\ListBox\KontaktListBox;
use LuzernTourismus\MarketingProgramm\Data\Aktivitaet\AktivitaetModel;
use LuzernTourismus\MarketingProgramm\Data\Aktivitaet\AktivitaetReader;
use Nemundo\Admin\Com\Form\AbstractAdminForm;
use Nemundo\Admin\Com\HtmlEditor\AdminHtmlEditor;
use Nemundo\Admin\Com\ListBox\AdminLargeTextBox;
use Nemundo\Admin\Com\ListBox\AdminTextBox;

class AktivitaetForm extends AbstractAdminForm
{

    public $aktivitaetId;

    /**
     * @var KategorieListBox
     */
    private $kategorie;


    /**
     * @var AdminTextBox
     */
    private $aktivitaet;

    /**
     * @var AdminTextBox
     */
    private $datum;

    /**
     * @var AdminHtmlEditor
     */
    private $kosten;

    /**
     * @var AdminHtmlEditor
     */
    private $leistung;

    /**
     * @var AdminTextBox
     */
    private $zielpublikum;

    /**
     * @var KontaktListBox
     */
    private $kontakt;

    public function getContent()
    {

        $model = new AktivitaetModel();


        $this->aktivitaet = new AdminTextBox($this);
        $this->aktivitaet->label = 'Aktivität';
        $this->aktivitaet->validation = true;

        $this->kategorie = new KategorieListBox($this);
        $this->kategorie->validation=true;

        $this->datum = new AdminTextBox($this);
        $this->datum->label = 'Datum';

        $this->kosten = new AdminHtmlEditor($this);
        $this->kosten->label = 'Kosten';
        //$this->kosten->showTable = true;

        $this->leistung = new AdminHtmlEditor($this);  //new AdminLargeTextBox($this);  // new AdminHtmlEditor($this);
        $this->leistung->label = 'Leistung';

        $this->zielpublikum = new AdminTextBox($this);
        $this->zielpublikum->label = $model->zielpublikum->label;


        $this->kontakt = new KontaktListBox($this);


        if ($this->aktivitaetId !== null) {

            $aktivitaetRow = (new AktivitaetReader())->getRowById($this->aktivitaetId);

            $this->aktivitaet->value = $aktivitaetRow->aktivitaet;
            $this->datum->value = $aktivitaetRow->datum;
            $this->kosten->value = $aktivitaetRow->kosten;
            $this->leistung->value = $aktivitaetRow->leistung;
            $this->zielpublikum->value = $aktivitaetRow->zielpublikum;
            $this->kategorie->value = $aktivitaetRow->kategorieId;
            $this->kontakt->value = $aktivitaetRow->kontaktId;

        }

        return parent::getContent();

    }


    protected function onSubmit()
    {

        $builder = new AktivitaetBuilder($this->aktivitaetId);
        $builder->aktivaet = $this->aktivitaet->getValue();
        $builder->datum = $this->datum->getValue();
        $builder->kosten = $this->kosten->getValue();
        $builder->leistung = $this->leistung->getValue();
        $builder->zielpublikum = $this->zielpublikum->getValue();
        $builder->kategorieId = $this->kategorie->getValue();
        $builder->kontaktId = $this->kontakt->getValue();
        $builder->build();


    }

}