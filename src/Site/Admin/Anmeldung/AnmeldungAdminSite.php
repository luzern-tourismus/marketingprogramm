<?php

namespace LuzernTourismus\MarketingProgramm\Site\Admin\Anmeldung;

use LuzernTourismus\MarketingProgramm\Page\Admin\Anmeldung\AnmeldungAdminPage;
use LuzernTourismus\MarketingProgramm\Usergroup\KontaktUsergroup;
use LuzernTourismus\MarketingProgramm\Usergroup\VerwaltungUsergroup;
use Nemundo\Web\Site\AbstractSite;

class AnmeldungAdminSite extends AbstractSite
{

    /**
     * @var AnmeldungAdminSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->title = 'Anmeldungen';
        $this->url = 'anmeldung-admin';
        $this->restricted = true;
        $this
            ->addRestrictedUsergroup(new KontaktUsergroup())
            ->addRestrictedUsergroup(new VerwaltungUsergroup());

        AnmeldungAdminSite::$site = $this;

        new AnmeldungExcelExportSite($this);

    }

    public function loadContent()
    {
        (new AnmeldungAdminPage())->render();
    }
}