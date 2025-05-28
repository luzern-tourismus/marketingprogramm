<?php

namespace LuzernTourismus\MarketingProgramm\Site\Admin\Kategorie;

use LuzernTourismus\MarketingProgramm\Page\Admin\Kategorie\KategorieEditPage;
use Nemundo\Admin\Site\AbstractEditIconSite;

class KategorieEditSite extends AbstractEditIconSite
{

    /**
     * @var KategorieEditSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->title = 'Kategorie bearbeiten';
        $this->url = 'kategorie-edit';

        KategorieEditSite::$site = $this;

    }

    public function loadContent()
    {
        (new KategorieEditPage())->render();
    }
}