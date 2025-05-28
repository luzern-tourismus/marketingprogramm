<?php

namespace LuzernTourismus\MarketingProgramm\Site\Admin\Aktivitaet;

use LuzernTourismus\MarketingProgramm\Page\Admin\Aktivitaet\AktivitaetNewPage;
use Nemundo\Admin\Site\AbstractNewIconSite;
use Nemundo\Web\Site\AbstractSite;

class AktivitaetNewSite extends AbstractNewIconSite
{

    /**
     * @var AktivitaetNewSite
     */
    public static $site;

    protected function loadSite()
    {
        //$this->title = 'AktivitaetNew';
        $this->url = 'aktivitaet-new';
        AktivitaetNewSite::$site = $this;
    }

    public function loadContent()
    {
        (new AktivitaetNewPage())->render();
    }
}