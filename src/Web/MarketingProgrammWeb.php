<?php

namespace LuzernTourismus\MarketingProgramm\Web;

use LuzernTourismus\MarketingProgramm\Controller\MarketingProgrammController;
use Nemundo\Admin\AdminConfig;
use Nemundo\User\Login\CookieLogin;
use Nemundo\Web\Base\AbstractWeb;

class MarketingProgrammWeb extends AbstractWeb
{
    public function loadWeb()
    {

        (new CookieLogin())->checkLogin();

        $title = 'Luzern Tourismus | Marketingprogramm';

        //AdminConfig::$defaultTemplateClassName = DataLuzernTemplate::class;
        AdminConfig::$defaultStylesheet= '/css/style.css';

        //WebConfig::$notFoundPageClass = NotFoundPage::class;
        //WebConfig::$forbiddenPageClass = ForbiddenPage::class;

        AdminConfig::$documentTitle = $title;
        AdminConfig::$logoUrl = '/img/logo_luzern.svg';
        AdminConfig::$logoText = $title;


//AdminConfig::$defaultTemplateClassName = DefaultContentTemplate::class;
        AdminConfig::$webController = new MarketingProgrammController();
        AdminConfig::$webController->render();

    }
}