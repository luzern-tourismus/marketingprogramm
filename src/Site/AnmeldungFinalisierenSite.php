<?php

namespace LuzernTourismus\MarketingProgramm\Site;

use LuzernTourismus\MarketingProgramm\Page\AnmeldungFinalisierenPage;
use Nemundo\Web\Site\AbstractSite;

class AnmeldungFinalisierenSite extends AbstractSite
{

    /**
     * @var AnmeldungFinalisierenSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->title = 'AnmeldungFinalisieren';
        $this->url = 'AnmeldungFinalisieren';
        $this->menuActive=false;

        AnmeldungFinalisierenSite::$site = $this;

    }

    public function loadContent()
    {
        (new AnmeldungFinalisierenPage())->render();
    }
}