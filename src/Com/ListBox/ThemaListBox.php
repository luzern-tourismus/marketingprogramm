<?php

namespace LuzernTourismus\MarketingProgramm\Com\ListBox;

use LuzernTourismus\MarketingProgramm\Data\Thema\ThemaReader;
use LuzernTourismus\MarketingProgramm\Parameter\ThemaParameter;
use Nemundo\Admin\Com\ListBox\AdminListBox;

class ThemaListBox extends AdminListBox
{

    protected function loadContainer()
    {

        parent::loadContainer();
        $this->name = (new ThemaParameter())->getParameterName();

    }

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