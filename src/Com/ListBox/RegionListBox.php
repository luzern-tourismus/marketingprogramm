<?php

namespace LuzernTourismus\MarketingProgramm\Com\ListBox;

use LuzernTourismus\MarketingProgramm\Reader\Region\RegionDataReader;
use Nemundo\Admin\Com\ListBox\AdminListBox;

class RegionListBox extends AdminListBox
{
    public function getContent()
    {
        $this->label = 'Region';

        foreach ((new RegionDataReader())->getData() as $regionRow) {
            $this->addItem($regionRow->id, $regionRow->region);
        }

        return parent::getContent();
    }
}