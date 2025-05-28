<?php

namespace LuzernTourismus\MarketingProgramm\Site\Admin\Partner;

use LuzernTourismus\MarketingProgramm\Page\Admin\Partner\PartnerItemPage;
use Nemundo\Web\Site\AbstractSite;

class PartnerItemSite extends AbstractSite
{

    /**
     * @var PartnerItemSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->title = 'PartnerItem';
        $this->url = 'partner-item';

        PartnerItemSite::$site = $this;

    }

    public function loadContent()
    {
        (new PartnerItemPage())->render();
    }
}