<?php

namespace LuzernTourismus\MarketingProgramm\Site\Admin\Aktivitaet;

use LuzernTourismus\MarketingProgramm\Page\Admin\Aktivitaet\AktivitaetEditPage;
use Nemundo\Admin\Site\AbstractEditIconSite;
use Nemundo\Web\Site\AbstractSite;

class AktivitaetEditSite extends AbstractEditIconSite
{


    /**
     * @var AktivitaetEditSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->title = 'AktivitaetEdit';
        $this->url = 'AktivitaetEdit';
        AktivitaetEditSite::$site = $this;
    }

    public function loadContent()
    {
        (new AktivitaetEditPage())->render();
    }
}