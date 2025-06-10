<?php

namespace LuzernTourismus\MarketingProgramm\Site\Admin\Kategorie;

use LuzernTourismus\MarketingProgramm\Page\Admin\Kategorie\KategorieItemPage;
use Nemundo\Web\Site\AbstractSite;

class KategorieItemSite extends AbstractSite
{

    /**
     * @var KategorieItemSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->title = 'KategorieItem';
        $this->url = 'KategorieItem';

        KategorieItemSite::$site = $this;

    }

    public function loadContent()
    {
        (new KategorieItemPage())->render();
    }
}