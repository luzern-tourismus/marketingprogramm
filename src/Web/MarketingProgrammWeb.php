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
//AdminConfig::$defaultTemplateClassName = DefaultContentTemplate::class;
        AdminConfig::$webController = new MarketingProgrammController();
        AdminConfig::$webController->render();
    }
}