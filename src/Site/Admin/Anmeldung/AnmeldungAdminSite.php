<?php

namespace LuzernTourismus\MarketingProgramm\Site\Admin\Anmeldung;

use LuzernTourismus\MarketingProgramm\Page\Admin\Anmeldung\AnmeldungAdminPage;
use Nemundo\Web\Site\AbstractSite;

class AnmeldungAdminSite extends AbstractSite
{
    protected function loadSite()
    {
        $this->title = 'Anmeldung';
        $this->url = 'anmeldung-admin';
    }

    public function loadContent()
    {
        (new AnmeldungAdminPage())->render();
    }
}