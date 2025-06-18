<?php

namespace LuzernTourismus\MarketingProgramm\Com\ListBox;

use LuzernTourismus\MarketingProgramm\Data\PartnerMitarbeiter\PartnerMitarbeiterReader;
use Nemundo\Admin\Com\ListBox\AdminListBox;

class PartnerMitarbeiterListBox extends AdminListBox
{

    public $partnerId;

    public function getContent()
    {
        $this->label = 'Mitarbeiter';

        $reader = new PartnerMitarbeiterReader();
        $reader->filter->andEqual($reader->model->partnerId, $this->partnerId);
        foreach ($reader->getData() as $partnerMitarbeiterRow) {
            $this->addItem($partnerMitarbeiterRow->id, $partnerMitarbeiterRow->getVornameName());
        }


        return parent::getContent();
    }
}