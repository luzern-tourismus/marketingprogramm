<?php

namespace LuzernTourismus\MarketingProgramm\Controller;


use LuzernTourismus\MarketingProgramm\Site\AktivitaetSite;
use LuzernTourismus\MarketingProgramm\Site\AnmeldungSaveSite;
use LuzernTourismus\MarketingProgramm\Site\AnmeldungSite;
use LuzernTourismus\MarketingProgramm\Site\HomeSite;
use LuzernTourismus\MarketingProgramm\Site\Admin\VerwaltungSite;

use LuzernTourismus\MarketingProgramm\Type\Thema\AbstractThema;
use LuzernTourismus\MarketingProgramm\Type\Thema\BasismarketingThema;
use LuzernTourismus\MarketingProgramm\Type\Thema\MarktmanagementThema;
use Nemundo\App\Application\Site\AppSite;
use Nemundo\App\UserAction\Site\UserActionSite;
use Nemundo\Core\Type\Text\Text;
use Nemundo\Web\Controller\AbstractWebController;

class MarketingProgrammController extends AbstractWebController
{
    protected function loadController()
    {

        new HomeSite($this);

        $this
            ->addThemaSite(new BasismarketingThema())
            ->addThemaSite(new MarktmanagementThema());


        /*$site = new AktivitaetSite($this);
        $site->thema = new BasismarketingThema();
        $site->title = 'Basis';
        $site->url = 'basis';

        $site = new AktivitaetSite($this);
        $site->title = 'Basis2';
        $site->url = 'basis2';*/


        new AnmeldungSaveSite($this);

        new AnmeldungSite($this);
        new VerwaltungSite($this);



        new AppSite($this);
        new \Nemundo\App\Application\Site\AdminSite($this);
        new UserActionSite($this);

    }


    private function addThemaSite(AbstractThema $thema)
    {

        $site = new AktivitaetSite($this);
        $site->thema = $thema;  // new BasismarketingThema();
        $site->title = $thema->thema;  // 'Basis';
        $site->url = (new Text($thema->thema))->changeToLowercase()->getValue();  // 'basis';

        return $this;

    }


}