<?php

namespace LuzernTourismus\MarketingProgramm\Site\Admin\Aktivitaet;

use LuzernTourismus\MarketingProgramm\Page\Admin\Aktivitaet\OptionEditPage;
use Nemundo\Admin\Site\AbstractEditIconSite;
use Nemundo\Web\Site\AbstractSite;

class OptionEditSite extends AbstractEditIconSite
{

    /**
     * @var OptionEditSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->title = 'OptionEdit';
        $this->url = 'OptionEdit';

        OptionEditSite::$site = $this;

    }

    public function loadContent()
    {
        (new OptionEditPage())->render();
    }
}