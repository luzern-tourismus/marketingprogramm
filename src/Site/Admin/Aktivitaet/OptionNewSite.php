<?php

namespace LuzernTourismus\MarketingProgramm\Site\Admin\Aktivitaet;

use LuzernTourismus\MarketingProgramm\Page\Admin\Aktivitaet\OptionEditPage;
use LuzernTourismus\MarketingProgramm\Page\Admin\Aktivitaet\OptionNewPage;
use Nemundo\Admin\Site\AbstractNewIconSite;

class OptionNewSite extends AbstractNewIconSite
{

    /**
     * @var OptionNewSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->title = 'Neue Option';
        $this->url = 'option-new';

        OptionNewSite::$site = $this;

    }

    public function loadContent()
    {
        (new OptionNewPage())->render();
    }
}