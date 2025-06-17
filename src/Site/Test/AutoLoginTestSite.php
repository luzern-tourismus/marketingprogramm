<?php

namespace LuzernTourismus\MarketingProgramm\Site\Test;

use LuzernTourismus\MarketingProgramm\Page\AutoLoginTestPage;
use Nemundo\Web\Site\AbstractSite;

class AutoLoginTestSite extends AbstractSite
{
    protected function loadSite()
    {
        $this->title = 'AutoLoginTest';
        $this->url = 'test-auto-login';
    }

    public function loadContent()
    {
        (new AutoLoginTestPage())->render();
    }
}