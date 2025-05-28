<?php

namespace LuzernTourismus\MarketingProgramm\Site\Admin\Kategorie;

use LuzernTourismus\MarketingProgramm\Data\Kategorie\KategorieUpdate;
use LuzernTourismus\MarketingProgramm\Parameter\KategorieParameter;
use Nemundo\Admin\Site\AbstractActiveIconSite;
use Nemundo\Admin\Site\AbstractDeleteIconSite;
use Nemundo\Core\Http\Url\UrlReferer;

class KategorieActiveSite extends AbstractActiveIconSite
{

    /**
     * @var KategorieActiveSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->title = 'KategorieActive';
        $this->url = 'Kategorie-active';

        KategorieActiveSite::$site = $this;

    }

    public function loadContent()
    {

        $kategorieId = (new KategorieParameter())->getValue();

        $update = new KategorieUpdate();
        $update->isDeleted = false;
        $update->updateById($kategorieId);

        (new UrlReferer())->redirect();

    }
}