<?php

namespace LuzernTourismus\MarketingProgramm\ChangeLog\Com\ListBox;

use LuzernTourismus\MarketingProgramm\Data\ChangeLogType\ChangeLogTypeReader;
use Nemundo\Admin\Com\ListBox\AdminListBox;

class ChangeLogTypeListBox extends AdminListBox
{

    public function getContent()
    {

        $this->label='Type';

        $reader = new ChangeLogTypeReader();
        foreach ($reader->getData() as $changeLogType) {
            $this->addItem($changeLogType->id,$changeLogType->changeLogType);
        }

        return parent::getContent();

    }

}