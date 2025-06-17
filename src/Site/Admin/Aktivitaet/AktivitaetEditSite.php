<?php

namespace LuzernTourismus\MarketingProgramm\Site\Admin\Aktivitaet;

use LuzernTourismus\MarketingProgramm\Page\Admin\Aktivitaet\AktivitaetEditPage;
use Nemundo\Admin\Site\AbstractEditIconSite;

class AktivitaetEditSite extends AbstractEditIconSite
{


    /**
     * @var AktivitaetEditSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->title = 'Aktivität editieren';
        $this->url = 'aktivitaet-edit';
        AktivitaetEditSite::$site = $this;
    }

    public function loadContent()
    {
        (new AktivitaetEditPage())->render();
    }
}