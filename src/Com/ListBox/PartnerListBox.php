<?php

namespace LuzernTourismus\MarketingProgramm\Com\ListBox;

use LuzernTourismus\MarketingProgramm\Data\Partner\PartnerReader;
use Nemundo\Admin\Com\ListBox\AdminListBox;

class PartnerListBox extends AdminListBox
{
    public function getContent()
    {
        $this->label = 'Partner';

        $reader = new PartnerReader();
        $reader->addOrder($reader->model->firma);
        foreach ($reader->getData() as $partnerRow) {
            $this->addItem($partnerRow->id,$partnerRow->firma);
        }

        return parent::getContent();
    }
}