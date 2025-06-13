<?php

namespace LuzernTourismus\MarketingProgramm\Business\Region;

use LuzernTourismus\MarketingProgramm\Business\Base\AbstractBuilder;
use LuzernTourismus\MarketingProgramm\Data\Region\Region;
use LuzernTourismus\MarketingProgramm\Data\Region\RegionReader;
use LuzernTourismus\MarketingProgramm\Data\Region\RegionUpdate;
use LuzernTourismus\MarketingProgramm\Data\RegionLog\RegionLog;

class RegionBuilder extends AbstractBuilder
{

    public $region;

    protected function loadBuilder()
    {

        $this->type = new RegionType();

    }


    protected function onCreate()
    {

        $data = new Region();
        $data->isDeleted = false;
        $data->region = $this->region;
        $this->id = $data->save();

        $regionRow = (new RegionReader())->getRowById($this->id);

        $data = new RegionLog();
        $data->logId = $this->logId;
        $data->regionId = $this->id;
        $data->regionHasChanged = true;
        $data->regionNew = $regionRow->region;
        $data->save();

    }


    protected function onUpdate()
    {

        $regionOldRow = (new RegionReader())->getRowById($this->id);

        $update = new RegionUpdate();
        $update->region = $this->region;
        $update->updateById($this->id);

        $regionNewRow = (new RegionReader())->getRowById($this->id);

        $data = new RegionLog();
        $data->logId = $this->logId;
        $data->regionId = $this->id;

        if ($regionOldRow->region !== $regionNewRow->region) {
            $data->regionHasChanged = true;
            $data->regionOld = $regionOldRow->region;
            $data->regionNew = $regionNewRow->region;
        } else {
            $data->regionHasChanged = false;
        }

        $data->save();

    }

}