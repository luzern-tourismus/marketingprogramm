<?php

namespace LuzernTourismus\MarketingProgramm\Com\ListBox;

use LuzernTourismus\MarketingProgramm\Data\ChangeLogOperation\ChangeLogOperationReader;
use Nemundo\Admin\Com\ListBox\AdminListBox;

class OperationListBox extends AdminListBox
{
    public function getContent()
    {
        $this->label = 'Operation';

        foreach ((new ChangeLogOperationReader())->getData() as $operationRow) {
            $this->addItem($operationRow->id, $operationRow->operation);
        }

        return parent::getContent();
    }
}