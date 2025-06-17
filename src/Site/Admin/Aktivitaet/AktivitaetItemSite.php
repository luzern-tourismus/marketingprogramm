<?php

namespace LuzernTourismus\MarketingProgramm\Site\Admin\Aktivitaet;

use LuzernTourismus\MarketingProgramm\Page\Admin\Aktivitaet\AktivitaetItemPage;
use Nemundo\Web\Site\AbstractSite;

class AktivitaetItemSite extends AbstractSite
{

    /**
     * @var AktivitaetItemSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->title = 'Optionen editieren';
        $this->url = 'aktivitaet-item';
        AktivitaetItemSite::$site = $this;

        new OptionEditSite($this);
        new OptionDeleteSite($this);
        new OptionActiveSite($this);

    }

    public function loadContent()
    {
        (new AktivitaetItemPage())->render();
    }
}