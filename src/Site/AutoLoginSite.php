<?php

namespace LuzernTourismus\MarketingProgramm\Site;

use Nemundo\Core\Debug\Debug;
use Nemundo\User\Login\SecureTokenLogin;
use Nemundo\User\Parameter\SecureTokenParameter;
use Nemundo\Web\Site\AbstractSite;

class AutoLoginSite extends AbstractSite
{

    /**
     * @var AutoLoginSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->title = 'AutoLogin';
        $this->url = 'auto-login';
        $this->menuActive = false;

        AutoLoginSite::$site = $this;

    }

    public function loadContent()
    {

        $seccureToken = (new SecureTokenParameter())->getValue();

        if ((new SecureTokenLogin())->checkLogin($seccureToken)) {
            (new HomeSite())->redirect();
        } else {

            (new Debug())->write('Login error');

        }

    }

}