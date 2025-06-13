<?php

namespace LuzernTourismus\MarketingProgramm\Site\Admin\Region;

use LuzernTourismus\MarketingProgramm\Page\Admin\Region\RegionNewPage;
use Nemundo\Admin\Site\AbstractNewIconSite;
use Nemundo\Web\Site\AbstractSite;

class RegionNewSite extends AbstractNewIconSite
{

    /**
     * @var RegionNewSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->title = 'RegionNew';
        $this->url = 'RegionNew';

        RegionNewSite::$site = $this;

    }

    public function loadContent()
    {
        (new RegionNewPage())->render();
    }
}