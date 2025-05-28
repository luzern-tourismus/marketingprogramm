<?php

namespace LuzernTourismus\MarketingProgramm\Site\Admin\Partner;

use LuzernTourismus\MarketingProgramm\Page\Admin\Partner\PartnerEditPage;
use Nemundo\Admin\Site\AbstractEditIconSite;
use Nemundo\Web\Site\AbstractSite;

class PartnerEditSite extends AbstractEditIconSite
{

    /**
     * @var PartnerEditSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->title = 'PartnerEdit';
        $this->url = 'partner-edit';

        PartnerEditSite::$site = $this;

    }

    public function loadContent()
    {
        (new PartnerEditPage())->render();
    }
}