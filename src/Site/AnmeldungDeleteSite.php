<?php

namespace LuzernTourismus\MarketingProgramm\Site;

use LuzernTourismus\MarketingProgramm\Data\Anmeldung\AnmeldungUpdate;
use LuzernTourismus\MarketingProgramm\Parameter\AnmeldungParameter;
use LuzernTourismus\MarketingProgramm\Usergroup\PartnerUsergroup;
use LuzernTourismus\MarketingProgramm\Usergroup\VerwaltungUsergroup;
use Nemundo\Admin\Site\AbstractDeleteIconSite;
use Nemundo\Core\Http\Url\UrlReferer;

class AnmeldungDeleteSite extends AbstractDeleteIconSite
{

    /**
     * @var AnmeldungSaveSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->title = 'Anmeldung löschen';
        $this->url = 'anmeldung-delete';
        //$this->menuActive = false;
        $this->restricted = true;
        $this
            ->addRestrictedUsergroup(new VerwaltungUsergroup())
            ->addRestrictedUsergroup(new PartnerUsergroup());

        AnmeldungDeleteSite::$site = $this;

    }

    public function loadContent()
    {

        $anmeldungId = (new AnmeldungParameter())->getValue();

        $update = new AnmeldungUpdate();
        $update->isDeleted = true;
        $update->updateById($anmeldungId);

        (new UrlReferer())->redirect();

    }
}