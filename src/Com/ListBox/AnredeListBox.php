<?php

namespace LuzernTourismus\MarketingProgramm\Com\ListBox;

use LuzernTourismus\MarketingProgramm\Data\Anrede\AnredeReader;
use Nemundo\Admin\Com\ListBox\AdminListBox;

class AnredeListBox extends AdminListBox
{
    public function getContent()
    {
        $this->label = 'Anrede';

        $reader = new AnredeReader();
        $reader->addOrder($reader->model->id);
        foreach ($reader->getData() as $anredeRow) {
            $this->addItem($anredeRow->id, $anredeRow->anrede);
        }

        return parent::getContent();
    }
}