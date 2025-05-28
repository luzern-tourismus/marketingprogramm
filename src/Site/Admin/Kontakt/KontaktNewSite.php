<?php

namespace LuzernTourismus\MarketingProgramm\Site\Admin\Kontakt;

use LuzernTourismus\MarketingProgramm\Page\Admin\Kontakt\KontaktNewPage;
use Nemundo\Admin\Site\AbstractNewIconSite;

class KontaktNewSite extends AbstractNewIconSite
{

    /**
     * @var KontaktNewSite
     */
    public static $site;

    protected function loadSite()
    {
        //$this->title = 'KontaktNew';
        $this->url = 'kontakt-new';

        KontaktNewSite::$site = $this;

    }

    public function loadContent()
    {
        (new KontaktNewPage())->render();
    }
}