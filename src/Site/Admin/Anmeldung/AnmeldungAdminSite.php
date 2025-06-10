<?php

namespace LuzernTourismus\MarketingProgramm\Site\Admin\Anmeldung;

use LuzernTourismus\MarketingProgramm\Page\Admin\Anmeldung\AnmeldungAdminPage;
use LuzernTourismus\MarketingProgramm\Usergroup\ReaderUsergroup;
use LuzernTourismus\MarketingProgramm\Usergroup\VerwaltungUsergroup;
use Nemundo\Web\Site\AbstractSite;

class AnmeldungAdminSite extends AbstractSite
{
    protected function loadSite()
    {
        $this->title = 'Anmeldung';
        $this->url = 'anmeldung-admin';
        $this->restricted = true;
        $this
            ->addRestrictedUsergroup(new ReaderUsergroup())
            ->addRestrictedUsergroup(new VerwaltungUsergroup());


        new AnmeldungExcelExportSite($this);

    }

    public function loadContent()
    {
        (new AnmeldungAdminPage())->render();
    }
}