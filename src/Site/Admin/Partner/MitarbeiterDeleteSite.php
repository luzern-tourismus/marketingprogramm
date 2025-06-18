<?php

namespace LuzernTourismus\MarketingProgramm\Site\Admin\Partner;

use LuzernTourismus\MarketingProgramm\Data\Partner\PartnerUpdate;
use LuzernTourismus\MarketingProgramm\Parameter\PartnerParameter;
use Nemundo\Admin\Site\AbstractDeleteIconSite;
use Nemundo\Core\Http\Url\UrlReferer;

class MitarbeiterDeleteSite extends AbstractDeleteIconSite
{

    /**
     * @var PartnerDeleteSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->title = 'Mitarbeiter löschen';
        $this->url = 'mitarbeiter-delete';

        MitarbeiterDeleteSite::$site = $this;

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