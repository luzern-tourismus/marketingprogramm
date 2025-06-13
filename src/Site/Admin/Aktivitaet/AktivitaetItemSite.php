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
        $this->title = 'AktivitaetItem';
        $this->url = 'AktivitaetItem';
        AktivitaetItemSite::$site = $this;

        new OptionEditSite($this);
        new OptionDeleteSite($this);

    }

    public function loadContent()
    {
        (new AktivitaetItemPage())->render();
    }
}