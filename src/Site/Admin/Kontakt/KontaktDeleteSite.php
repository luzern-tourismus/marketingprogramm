<?php

namespace LuzernTourismus\MarketingProgramm\Site\Admin\Kontakt;

use LuzernTourismus\MarketingProgramm\Business\Kontakt\KontaktBuilder;
use LuzernTourismus\MarketingProgramm\Data\Kategorie\KategorieUpdate;
use LuzernTourismus\MarketingProgramm\Data\Kontakt\KontaktUpdate;
use LuzernTourismus\MarketingProgramm\Page\Admin\Kontakt\KontaktNewPage;
use LuzernTourismus\MarketingProgramm\Parameter\KategorieParameter;
use LuzernTourismus\MarketingProgramm\Parameter\KontaktParameter;
use Nemundo\Admin\Site\AbstractDeleteIconSite;
use Nemundo\Admin\Site\AbstractNewIconSite;
use Nemundo\Core\Http\Url\UrlReferer;

class KontaktDeleteSite extends AbstractDeleteIconSite
{

    /**
     * @var KontaktDeleteSite
     */
    public static $site;

    protected function loadSite()
    {
        //$this->title = 'KontaktNew';
        $this->url = 'kontakt-delete';

        KontaktDeleteSite::$site = $this;

    }

    public function loadContent()
    {

        $kontaktId = (new KontaktParameter())->getValue();
        (new KontaktBuilder($kontaktId))->delete();

        /*$update = new KontaktUpdate();
        $update->isDeleted = true;
        $update->updateById($kontaktId);*/

        (new UrlReferer())->redirect();

    }
}