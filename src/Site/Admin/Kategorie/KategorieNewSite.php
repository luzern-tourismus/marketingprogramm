<?php

namespace LuzernTourismus\MarketingProgramm\Site\Admin\Kategorie;

use LuzernTourismus\MarketingProgramm\Page\Admin\Kategorie\KategorieNewPage;
use Nemundo\Admin\Site\AbstractNewIconSite;

class KategorieNewSite extends AbstractNewIconSite
{

    /**
     * @var KategorieNewSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->title = 'Neue Kategorie';
        $this->url = 'kategorie-new';

        KategorieNewSite::$site = $this;

    }

    public function loadContent()
    {
        (new KategorieNewPage())->render();
    }
}