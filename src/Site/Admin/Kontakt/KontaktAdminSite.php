<?php

namespace LuzernTourismus\MarketingProgramm\Site\Admin\Kontakt;

use LuzernTourismus\MarketingProgramm\Page\Admin\Kontakt\KontaktAdminPage;
use Nemundo\Web\Site\AbstractSite;

class KontaktAdminSite extends AbstractSite
{

    /**
     * @var KontaktAdminSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->title = 'Kontakt';
        $this->url = 'kontakt';

        new KontaktNewSite($this);
        new KontaktEditSite($this);
        new KontaktDeleteSite($this);
        new KontaktActiveSite($this);

        KontaktAdminSite::$site = $this;

    }

    public function loadContent()
    {
        (new KontaktAdminPage())->render();
    }
}