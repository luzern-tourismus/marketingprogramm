<?php

namespace LuzernTourismus\MarketingProgramm\Site\Admin\Partner;

use LuzernTourismus\MarketingProgramm\Data\Partner\PartnerUpdate;
use LuzernTourismus\MarketingProgramm\Page\Admin\Partner\PartnerNewPage;
use LuzernTourismus\MarketingProgramm\Parameter\PartnerParameter;
use Nemundo\Admin\Site\AbstractDeleteIconSite;
use Nemundo\Admin\Site\AbstractNewIconSite;
use Nemundo\Core\Http\Url\UrlReferer;

class PartnerDeleteSite extends AbstractDeleteIconSite
{

    /**
     * @var PartnerDeleteSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->title = 'PartnerNew';
        $this->url = 'Partner-delete';

        PartnerDeleteSite::$site = $this;

    }

    public function loadContent()
    {

        $partnerId = (new PartnerParameter())->getValue();

        $update = new PartnerUpdate();
        $update->isDeleted=true;
        $update->updateById($partnerId);

        (new UrlReferer())->redirect();

    }
}