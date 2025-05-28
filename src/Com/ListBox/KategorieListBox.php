<?php

namespace LuzernTourismus\MarketingProgramm\Com\ListBox;

use LuzernTourismus\MarketingProgramm\Data\Kategorie\KategorieReader;
use Nemundo\Admin\Com\ListBox\AdminListBox;

class KategorieListBox extends AdminListBox
{
    public function getContent()
    {
        $this->label = 'Kategorie';

        $reader = new KategorieReader();
        $reader->filter->andEqual($reader->model->isDeleted,false);
        $reader->addOrder($reader->model->kategorie);
        foreach ($reader->getData() as $kategorieRow) {
            $this->addItem($kategorieRow->id,$kategorieRow->kategorie);
        }


        return parent::getContent();
    }
}