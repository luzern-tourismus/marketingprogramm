<?php

namespace LuzernTourismus\MarketingProgramm\Controller;


use LuzernTourismus\MarketingProgramm\Config\MarketingprogrammConfig;
use LuzernTourismus\MarketingProgramm\Site\Admin\VerwaltungSite;
use LuzernTourismus\MarketingProgramm\Site\AktivitaetSite;
use LuzernTourismus\MarketingProgramm\Site\AnmeldungDeleteSite;
use LuzernTourismus\MarketingProgramm\Site\AnmeldungSaveSite;
use LuzernTourismus\MarketingProgramm\Site\AnmeldungSite;
use LuzernTourismus\MarketingProgramm\Site\AutoLoginSite;
use LuzernTourismus\MarketingProgramm\Site\HomeSite;
use LuzernTourismus\MarketingProgramm\Site\Test\AutoLoginTestSite;
use LuzernTourismus\MarketingProgramm\Type\Thema\AbstractThema;
use LuzernTourismus\MarketingProgramm\Type\Thema\BasismarketingThema;
use LuzernTourismus\MarketingProgramm\Type\Thema\MarktmanagementThema;
use LuzernTourismus\MarketingProgramm\Type\Thema\TouristInformationThema;
use Nemundo\App\Application\Site\AdminAppSite;
use Nemundo\App\UserAction\Site\UserActionSite;
use Nemundo\Core\Text\TextConverter;
use Nemundo\Web\Controller\AbstractWebController;

class MarketingProgrammController extends AbstractWebController
{
    protected function loadController()
    {

        new HomeSite($this);

        $this
            ->addThemaSite(new TouristInformationThema())
            ->addThemaSite(new BasismarketingThema())
            ->addThemaSite(new MarktmanagementThema());

        new AnmeldungSaveSite($this);
        new AnmeldungDeleteSite($this);
        new AnmeldungSite($this);
        new VerwaltungSite($this);
        //new AppSite($this);
        new AdminAppSite($this);
        new UserActionSite($this);
        new AutoLoginSite($this);


        if (MarketingProgrammConfig::$devMode) {
            new AutoLoginTestSite($this);
        }


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