<?php

namespace LuzernTourismus\MarketingProgramm\Site\Admin\Partner;

use LuzernTourismus\MarketingProgramm\Data\Partner\PartnerUpdate;
use LuzernTourismus\MarketingProgramm\Parameter\PartnerParameter;
use Nemundo\Admin\Site\AbstractActiveIconSite;
use Nemundo\Core\Http\Url\UrlReferer;

class PartnerActiveSite extends AbstractActiveIconSite
{

    /**
     * @var PartnerActiveSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->title = 'Partner aktivieren';
        $this->url = 'partner-active';

        PartnerActiveSite::$site = $this;

    }

    public function loadContent()
    {

        $partnerId = (new PartnerParameter())->getValue();

        $update = new PartnerUpdate();
        $update->isDeleted = false;
        $update->updateById($partnerId);

        (new UrlReferer())->redirect();

    }
}