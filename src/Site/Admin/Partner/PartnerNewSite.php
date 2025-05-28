<?php

namespace LuzernTourismus\MarketingProgramm\Site\Admin\Partner;

use LuzernTourismus\MarketingProgramm\Page\Admin\Partner\PartnerNewPage;
use Nemundo\Admin\Site\AbstractNewIconSite;
use Nemundo\Web\Site\AbstractSite;

class PartnerNewSite extends AbstractNewIconSite
{

    /**
     * @var PartnerAdminSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->title = 'PartnerNew';
        $this->url = 'partner-new';

        PartnerNewSite::$site = $this;

    }

    public function loadContent()
    {
        (new PartnerNewPage())->render();
    }
}