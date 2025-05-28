<?php

namespace LuzernTourismus\MarketingProgramm\Site;

use LuzernTourismus\MarketingProgramm\Business\Partner\PartnerBuilder;
use LuzernTourismus\MarketingProgramm\Page\AktivitaetPage;
use LuzernTourismus\MarketingProgramm\Type\Thema\AbstractThema;
use LuzernTourismus\MarketingProgramm\Usergroup\PartnerUsergroup;
use LuzernTourismus\MarketingProgramm\Usergroup\VerwaltungUsergroup;
use Nemundo\Web\Site\AbstractSite;

class AktivitaetSite extends AbstractSite
{

    /**
     * @var AktivitaetSite
     */
    public static $site;


    /**
     * @var AbstractThema
     */
    public $thema;


    protected function loadSite()
    {
        $this->title = 'Aktivität';
        $this->url = 'aktivitaet';
        $this->restricted=true;
        $this
            ->addRestrictedUsergroup(new VerwaltungUsergroup())
            ->addRestrictedUsergroup(new PartnerUsergroup());

        //new AnmeldungSaveSite($this);

    }

    public function loadContent()
    {
        $page = new AktivitaetPage();
        $page->thema = $this->thema;
        $page->render();
    }
}