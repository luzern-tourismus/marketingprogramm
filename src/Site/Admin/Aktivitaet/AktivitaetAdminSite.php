<?php

namespace LuzernTourismus\MarketingProgramm\Site\Admin\Aktivitaet;


use LuzernTourismus\MarketingProgramm\Page\Admin\Aktivitaet\AktivitaetAdminPage;
use LuzernTourismus\MarketingProgramm\Usergroup\ReaderUsergroup;
use LuzernTourismus\MarketingProgramm\Usergroup\VerwaltungUsergroup;
use Nemundo\Web\Site\AbstractSite;

class AktivitaetAdminSite extends AbstractSite
{

    /**
     * @var AktivitaetAdminSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->title = 'Aktivität';
        $this->url = 'aktivitaet';
        $this->restricted = true;
        $this->addRestrictedUsergroup(new VerwaltungUsergroup());

        AktivitaetAdminSite::$site = $this;

        new AktivitaetItemSite($this);
        new AktivitaetNewSite($this);
        new AktivitaetEditSite($this);
        new AktivitaetDeleteSite($this);
        new AktivitaetActiveSite($this);

    }

    public function loadContent()
    {

        (new AktivitaetAdminPage())->render();

    }
}