<?php

namespace LuzernTourismus\MarketingProgramm\Com\ListBox;

use LuzernTourismus\MarketingProgramm\Data\Partner\PartnerReader;
use LuzernTourismus\MarketingProgramm\Parameter\PartnerParameter;
use Nemundo\Admin\Com\ListBox\AdminListBox;

class PartnerListBox extends AdminListBox
{

    protected function loadContainer()
    {

        parent::loadContainer();

        $this->label = 'Kategorie';
        $this->name = (new PartnerParameter())->getParameterName();

    }

    public function getContent()
    {
        $this->label = 'Partner';

        $reader = new PartnerReader();
        $reader->addOrder($reader->model->firma);
        foreach ($reader->getData() as $partnerRow) {
            $this->addItem($partnerRow->id, $partnerRow->firma);
        }

        return parent::getContent();
    }
}