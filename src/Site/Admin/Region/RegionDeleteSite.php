<?php

namespace LuzernTourismus\MarketingProgramm\Site\Admin\Region;

use LuzernTourismus\MarketingProgramm\Data\Region\RegionUpdate;
use LuzernTourismus\MarketingProgramm\Page\Admin\Region\RegionEditPage;
use LuzernTourismus\MarketingProgramm\Parameter\RegionParameter;
use Nemundo\Admin\Site\AbstractDeleteIconSite;
use Nemundo\Admin\Site\AbstractEditIconSite;
use Nemundo\Core\Http\Url\UrlRedirect;
use Nemundo\Core\Http\Url\UrlReferer;

class RegionDeleteSite extends AbstractDeleteIconSite
{

    /**
     * @var RegionDeleteSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->title = 'RegionDelete';
        $this->url = 'region-delete';

        RegionDeleteSite::$site = $this;

    }

    public function loadContent()
    {

        $update = new RegionUpdate();
        $update->isDeleted=true;
        $update->updateById((new RegionParameter())->getValue());

        (new UrlReferer())->redirect();


    }
}