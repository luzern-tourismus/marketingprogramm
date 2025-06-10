<?php

namespace LuzernTourismus\MarketingProgramm\Site\Admin\Partner;

use LuzernTourismus\MarketingProgramm\Page\Admin\Partner\PartnerAdminPage;
use LuzernTourismus\MarketingProgramm\Usergroup\VerwaltungUsergroup;
use Nemundo\Web\Site\AbstractSite;

class PartnerAdminSite extends AbstractSite
{

    /**
     * @var PartnerAdminSite
     */
    public static $site;

    protected function loadSite()
    {

        $this->title = 'Partner';
        $this->url = 'partner';
        $this->restricted = true;
        $this->addRestrictedUsergroup(new VerwaltungUsergroup());


        new PartnerItemSite($this);
        new PartnerNewSite($this);
        new PartnerEditSite($this);
        new PartnerDeleteSite($this);
        new PartnerActiveSite($this);
        new PartnerBestaetigungPdfSite($this);

        PartnerAdminSite::$site = $this;

    }

    public function loadContent()
    {
        (new PartnerAdminPage())->render();
    }
}