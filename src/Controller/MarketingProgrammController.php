<?php

namespace LuzernTourismus\MarketingProgramm\Controller;


use LuzernTourismus\MarketingProgramm\Site\HomeSite;
use Nemundo\App\Application\Site\AdminSite;
use Nemundo\App\Application\Site\AppSite;
use Nemundo\App\UserAction\Site\UserActionSite;
use Nemundo\Web\Controller\AbstractWebController;

class MarketingProgrammController extends AbstractWebController
{
    protected function loadController()
    {
        new HomeSite($this);
        new AppSite($this);
        new AdminSite($this);
        new UserActionSite($this);

    }
}