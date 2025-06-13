<?php

namespace LuzernTourismus\MarketingProgramm\Site\Admin\Region;

use LuzernTourismus\MarketingProgramm\Page\Admin\Region\RegionAdminPage;
use LuzernTourismus\MarketingProgramm\Page\Admin\Region\RegionEditPage;
use LuzernTourismus\MarketingProgramm\Page\Admin\Region\RegionNewPage;
use Nemundo\Web\Site\AbstractSite;

class RegionAdminSite extends AbstractSite
{

    /**
     * @var RegionAdminSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->title = 'Region';
        $this->url = 'RegionAdmin';

        new RegionNewSite($this);
        new RegionEditSite($this);
        new RegionDeleteSite($this);

        RegionAdminSite::$site = $this;

    }

    public function loadContent()
    {
        (new RegionAdminPage())->render();
    }
}