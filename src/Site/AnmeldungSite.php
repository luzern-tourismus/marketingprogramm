<?php

namespace LuzernTourismus\MarketingProgramm\Site;

use LuzernTourismus\MarketingProgramm\Page\AnmeldungPage;
use LuzernTourismus\MarketingProgramm\Usergroup\PartnerUsergroup;
use LuzernTourismus\MarketingProgramm\Usergroup\KontaktUsergroup;
use LuzernTourismus\MarketingProgramm\Usergroup\VerwaltungUsergroup;
use Nemundo\Web\Site\AbstractSite;

class AnmeldungSite extends AbstractSite
{
    protected function loadSite()
    {
        $this->title = 'Anmeldungen';
        $this->url = 'anmeldung';
        $this->restricted = true;
        $this
            ->addRestrictedUsergroup(new VerwaltungUsergroup())
            ->addRestrictedUsergroup(new PartnerUsergroup());


        new AnmeldungFinalisierenSite($this);


    }

    public function loadContent()
    {
        (new AnmeldungPage())->render();
    }
}