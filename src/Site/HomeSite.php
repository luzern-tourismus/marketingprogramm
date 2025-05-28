<?php

namespace LuzernTourismus\MarketingProgramm\Site;

use LuzernTourismus\MarketingProgramm\Page\HomePage;
use Nemundo\Web\Site\AbstractSite;

class HomeSite extends AbstractSite
{
    protected function loadSite()
    {
        $this->title = 'Home';
        $this->url = '';
        $this->menuActive = false;
    }

    public function loadContent()
    {
        (new HomePage())->render();
    }
}