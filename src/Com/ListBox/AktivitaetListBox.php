<?php

namespace LuzernTourismus\MarketingProgramm\Com\ListBox;

use LuzernTourismus\MarketingProgramm\Data\Aktivitaet\AktivitaetReader;
use Nemundo\Admin\Com\ListBox\AdminListBox;

class AktivitaetListBox extends AdminListBox
{
    public function getContent()
    {

        $this->label = 'Aktivität';

        $reader = new AktivitaetReader();
        $reader->addOrder($reader->model->aktivitaet);
        foreach ($reader->getData() as $aktivitaetRow) {
            $this->addItem($aktivitaetRow->id, $aktivitaetRow->aktivitaet);
        }

        return parent::getContent();
    }
}