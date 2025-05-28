<?php

namespace LuzernTourismus\MarketingProgramm\Site\Admin\Kontakt;

use LuzernTourismus\MarketingProgramm\Page\Admin\Kontakt\KontaktEditPage;
use Nemundo\Web\Site\AbstractSite;

class KontaktEditSite extends AbstractSite
{

    /**
     * @var KontaktEditSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->title = 'KontaktEdit';
        $this->url = 'kontakt-edit';
        KontaktEditSite::$site = $this;
    }

    public function loadContent()
    {
        (new KontaktEditPage())->render();
    }
}