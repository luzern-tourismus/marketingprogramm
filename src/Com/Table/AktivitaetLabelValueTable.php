<?php

namespace LuzernTourismus\MarketingProgramm\Com\Table;

use LuzernTourismus\MarketingProgramm\Data\Aktivitaet\AktivitaetRow;
use LuzernTourismus\MarketingProgramm\Reader\Aktivitaet\AktivitaetDataReader;
use Nemundo\Admin\Com\Table\AdminLabelValueTable;

class AktivitaetLabelValueTable extends AdminLabelValueTable
{

    /**
     * @var AktivitaetRow
     */
    public $aktivitaetRow;



    public function fromAktivitaetId($aktivitaetId)
    {

        $this->aktivitaetRow = (new AktivitaetDataReader())->getRowById($aktivitaetId);
        return $this;

    }


    public function fromAktivitaetRow(AktivitaetRow $aktivitaetRow)
    {

        $this->aktivitaetRow =$aktivitaetRow;
        return $this;

    }




    public function getContent()
    {

        $this
            ->addLabelValue($this->aktivitaetRow->model->aktivitaet->label, $this->aktivitaetRow->aktivitaet)
            ->addLabelValue($this->aktivitaetRow->model->kategorie->label, $this->aktivitaetRow->kategorie->kategorie)
            ->addLabelValue($this->aktivitaetRow->model->kategorie->thema->label, $this->aktivitaetRow->kategorie->thema->thema)
            ->addLabelValue($this->aktivitaetRow->model->datum->label, $this->aktivitaetRow->datum)
            ->addLabelValue($this->aktivitaetRow->model->kosten->label, $this->aktivitaetRow->kosten)
            ->addLabelValue($this->aktivitaetRow->model->leistung->label, $this->aktivitaetRow->leistung)
            ->addLabelValue($this->aktivitaetRow->model->zielpublikum->label, $this->aktivitaetRow->zielpublikum)
            ->addLabelValue($this->aktivitaetRow->model->kontakt->label, $this->aktivitaetRow->kontakt->vorname . ' ' . $this->aktivitaetRow->kontakt->nachname . ', ' . $this->aktivitaetRow->kontakt->telefon . ' ' . $this->aktivitaetRow->kontakt->email);;




        return parent::getContent();

    }

}