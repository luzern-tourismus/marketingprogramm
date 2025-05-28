<?php

namespace LuzernTourismus\MarketingProgramm\Site\Admin\Kategorie;

use LuzernTourismus\MarketingProgramm\Page\Admin\Kategorie\KategorieAdminPage;
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

        new KategorieNewSite($this);
        new KategorieEditSite($this);
        new KategorieDeleteSite($this);
        new KategorieActiveSite($this);

        KategorieAdminSite::$site = $this;

    }

    public function loadContent()
    {
        (new KategorieAdminPage())->render();
    }
}