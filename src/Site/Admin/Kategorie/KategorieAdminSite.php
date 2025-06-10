<?php

namespace LuzernTourismus\MarketingProgramm\Site\Admin\Kategorie;

use LuzernTourismus\MarketingProgramm\Page\Admin\Kategorie\KategorieAdminPage;
use LuzernTourismus\MarketingProgramm\Usergroup\VerwaltungUsergroup;
use Nemundo\Web\Site\AbstractSite;

class KategorieAdminSite extends AbstractSite
{

    /**
     * @var KategorieAdminSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->title = 'Kategorie';
        $this->url = 'kategorie';
        $this->restricted = true;
        $this->addRestrictedUsergroup(new VerwaltungUsergroup());


        new KategorieNewSite($this);
        new KategorieEditSite($this);
        new KategorieDeleteSite($this);
        new KategorieActiveSite($this);
        new KategorieItemSite($this);

        KategorieAdminSite::$site = $this;

    }

    public function loadContent()
    {
        (new KategorieAdminPage())->render();
    }
}