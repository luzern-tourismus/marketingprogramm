<?php

namespace LuzernTourismus\MarketingProgramm\Site;

use LuzernTourismus\MarketingProgramm\Data\Anmeldung\Anmeldung;
use LuzernTourismus\MarketingProgramm\Lookup\PartnerLookup;
use LuzernTourismus\MarketingProgramm\Page\AnmeldungPage;
use LuzernTourismus\MarketingProgramm\Parameter\AktivitaetParameter;
use LuzernTourismus\MarketingProgramm\Usergroup\PartnerUsergroup;
use LuzernTourismus\MarketingProgramm\Usergroup\VerwaltungUsergroup;
use Nemundo\Core\Http\Url\UrlReferer;
use Nemundo\Web\Site\AbstractSite;

class AnmeldungSaveSite extends AbstractSite
{

    /**
     * @var AnmeldungSaveSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->title = 'Anmeldung';
        $this->url = 'anmeldung-save';
        $this->menuActive = false;
        $this->restricted = true;
        $this
            ->addRestrictedUsergroup(new VerwaltungUsergroup())
            ->addRestrictedUsergroup(new PartnerUsergroup());

        AnmeldungSaveSite::$site = $this;

    }

    public function loadContent()
    {

        $aktivitaetId = (new AktivitaetParameter())->getValue();

        $data = new Anmeldung();
        $data->isDeleted = false;
        $data->aktivitaetId = $aktivitaetId;
        $data->partnerId = (new PartnerLookup())->getPartnerId();  // 0;
        $data->save();

        (new UrlReferer())->redirect();

    }
}