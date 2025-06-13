<?php

namespace LuzernTourismus\MarketingProgramm\Site\Admin;

use LuzernTourismus\MarketingProgramm\Site\Admin\Aktivitaet\AktivitaetAdminSite;
use LuzernTourismus\MarketingProgramm\Site\Admin\Anmeldung\AnmeldungAdminSite;
use LuzernTourismus\MarketingProgramm\Site\Admin\ChangeLog\ChangeLogSite;
use LuzernTourismus\MarketingProgramm\Site\Admin\Kategorie\KategorieAdminSite;
use LuzernTourismus\MarketingProgramm\Site\Admin\Kontakt\KontaktAdminSite;
use LuzernTourismus\MarketingProgramm\Site\Admin\Partner\PartnerAdminSite;
use LuzernTourismus\MarketingProgramm\Site\Admin\Region\RegionAdminSite;
use LuzernTourismus\MarketingProgramm\Usergroup\KontaktUsergroup;
use LuzernTourismus\MarketingProgramm\Usergroup\VerwaltungUsergroup;
use Nemundo\Web\Site\AbstractSite;

class VerwaltungSite extends AbstractSite
{
    protected function loadSite()
    {
        $this->title = 'Verwaltung';
        $this->url = 'verwaltung';
        $this->restricted = true;
        $this
            ->addRestrictedUsergroup(new KontaktUsergroup())
            ->addRestrictedUsergroup(new VerwaltungUsergroup());

        new AnmeldungAdminSite($this);
        new AktivitaetAdminSite($this);
        new KategorieAdminSite($this);
        new RegionAdminSite($this);
        new KontaktAdminSite($this);
        new PartnerAdminSite($this);
        new ChangeLogSite($this);


    }

    public function loadContent()
    {

    }
}