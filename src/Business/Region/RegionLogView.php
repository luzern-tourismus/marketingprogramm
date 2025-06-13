<?php

namespace LuzernTourismus\MarketingProgramm\Business\Region;

use LuzernTourismus\MarketingProgramm\ChangeLog\Com\AbstractLogView;
use LuzernTourismus\MarketingProgramm\Data\KategorieLog\KategorieLogReader;
use LuzernTourismus\MarketingProgramm\Data\RegionLog\RegionLogReader;
use Nemundo\Admin\Com\Html\AdminUnorderedList;

class RegionLogView extends AbstractLogView
{

    public function getContent()
    {

        $reader = new RegionLogReader();
        $reader->filter->andEqual($reader->model->logId, $this->logId);

        foreach ($reader->getData() as $regionLogRow) {

            $ul = new AdminUnorderedList($this);

            if ($regionLogRow->regionHasChanged) {
                $ul->addText($regionLogRow->regionOld . ' => ' . $regionLogRow->regionNew);
            }

        }

        return parent::getContent();

    }

}