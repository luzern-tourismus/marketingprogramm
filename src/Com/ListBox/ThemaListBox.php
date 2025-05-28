<?php

namespace LuzernTourismus\MarketingProgramm\Com\ListBox;

use LuzernTourismus\MarketingProgramm\Data\Thema\ThemaReader;
use Nemundo\Admin\Com\ListBox\AdminListBox;

class ThemaListBox extends AdminListBox
{
    public function getContent()
    {
        $this->label = 'Thema';

        $reader = new ThemaReader();
        foreach ($reader->getData() as $themaRow) {
        $this->addItem($themaRow->id, $themaRow->thema);
    }



        return parent::getContent();
    }
}