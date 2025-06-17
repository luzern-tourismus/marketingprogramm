<?php

namespace LuzernTourismus\MarketingProgramm\Com\ListBox;

use LuzernTourismus\MarketingProgramm\Data\Kontakt\KontaktReader;
use LuzernTourismus\MarketingProgramm\Parameter\KontaktParameter;
use Nemundo\Admin\Com\ListBox\AdminListBox;

class KontaktListBox extends AdminListBox
{


    protected function loadContainer()
    {

        parent::loadContainer();

        $this->label = 'Kategorie';
        $this->name = (new KontaktParameter())->getParameterName();

    }


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