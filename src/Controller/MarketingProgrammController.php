<?php

namespace LuzernTourismus\MarketingProgramm\Controller;


use LuzernTourismus\MarketingProgramm\Site\Admin\VerwaltungSite;
use LuzernTourismus\MarketingProgramm\Site\AktivitaetSite;
use LuzernTourismus\MarketingProgramm\Site\AnmeldungDeleteSite;
use LuzernTourismus\MarketingProgramm\Site\AnmeldungSaveSite;
use LuzernTourismus\MarketingProgramm\Site\AnmeldungSite;
use LuzernTourismus\MarketingProgramm\Site\HomeSite;
use LuzernTourismus\MarketingProgramm\Type\Thema\AbstractThema;
use LuzernTourismus\MarketingProgramm\Type\Thema\BasismarketingThema;
use LuzernTourismus\MarketingProgramm\Type\Thema\MarktmanagementThema;
use LuzernTourismus\MarketingProgramm\Type\Thema\WerbungThema;
use Nemundo\App\Application\Site\AdminAppSite;
use Nemundo\App\Application\Site\AppSite;
use Nemundo\App\UserAction\Site\UserActionSite;
use Nemundo\Core\Text\TextConverter;
use Nemundo\Web\Controller\AbstractWebController;

class MarketingProgrammController extends AbstractWebController
{
    protected function loadController()
    {

        new HomeSite($this);

        $this
            ->addThemaSite(new WerbungThema())
            ->addThemaSite(new BasismarketingThema())
            ->addThemaSite(new MarktmanagementThema());

        new AnmeldungSaveSite($this);
        new AnmeldungDeleteSite($this);

        new AnmeldungSite($this);
        new VerwaltungSite($this);


        new AppSite($this);
        new AdminAppSite($this);
        new UserActionSite($this);

    }


    private function addThemaSite(AbstractThema $thema)
    {

        $site = new AktivitaetSite($this);
        $site->thema = $thema;
        $site->title = $thema->thema;
        $site->url = (new TextConverter())->convertToUrl($thema->thema);

        return $this;

    }


}