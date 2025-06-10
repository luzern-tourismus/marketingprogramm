<?php

namespace LuzernTourismus\MarketingProgramm\Com\ListBox;

use LuzernTourismus\MarketingProgramm\Data\Kontakt\KontaktReader;
use Nemundo\Admin\Com\ListBox\AdminListBox;

class KontaktListBox extends AdminListBox
{
    public function getContent()
    {
        $this->label = 'Kontakt';

        $reader = new KontaktReader();
        $reader->filter->andEqual($reader->model->isDeleted, false);
        foreach ($reader->getData() as $kontaktRow) {
            $this->addItem($kontaktRow->id, $kontaktRow->getVornameNachname());
        }

        return parent::getContent();
    }
}