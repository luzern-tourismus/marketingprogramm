<?php

namespace LuzernTourismus\MarketingProgramm\Site\Admin\Region;

use LuzernTourismus\MarketingProgramm\Page\Admin\Region\RegionEditPage;
use Nemundo\Admin\Site\AbstractEditIconSite;
use Nemundo\Web\Site\AbstractSite;

class RegionEditSite extends AbstractEditIconSite
{

    /**
     * @var RegionEditSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->title = 'Region editieren';
        $this->url = 'RegionEdit';

        RegionEditSite::$site = $this;

    }

    public function loadContent()
    {
        (new RegionEditPage())->render();
    }
}