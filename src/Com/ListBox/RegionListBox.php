<?php

namespace LuzernTourismus\MarketingProgramm\Com\ListBox;

use LuzernTourismus\MarketingProgramm\Parameter\RegionParameter;
use LuzernTourismus\MarketingProgramm\Reader\Region\RegionDataReader;
use Nemundo\Admin\Com\ListBox\AdminListBox;

class RegionListBox extends AdminListBox
{

    protected function loadContainer()
    {

        parent::loadContainer();
        $this->name = (new RegionParameter())->getParameterName();

    }

    public function getContent()
    {
        $this->label = 'Region';

        $reader = new RegionDataReader();
        $reader->filter->andEqual($reader->model->isDeleted, false);
        foreach ($reader->getData() as $regionRow) {
            $this->addItem($regionRow->id, $regionRow->region);
        }

        return parent::getContent();
    }
}