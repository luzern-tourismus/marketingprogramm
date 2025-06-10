<?php

namespace LuzernTourismus\MarketingProgramm\Site\Admin\Kontakt;

use LuzernTourismus\MarketingProgramm\Business\Kontakt\KontaktBuilder;
use LuzernTourismus\MarketingProgramm\Data\Kontakt\KontaktUpdate;
use LuzernTourismus\MarketingProgramm\Parameter\KontaktParameter;
use Nemundo\Admin\Site\AbstractActiveIconSite;
use Nemundo\Admin\Site\AbstractDeleteIconSite;
use Nemundo\Core\Http\Url\UrlReferer;

class KontaktActiveSite extends AbstractActiveIconSite
{

    /**
     * @var KontaktActiveSite
     */
    public static $site;

    protected function loadSite()
    {
        //$this->title = 'KontaktNew';
        $this->url = 'kontakt-active';

        KontaktActiveSite::$site = $this;

    }

    public function loadContent()
    {

        $kontaktId = (new KontaktParameter())->getValue();
        (new KontaktBuilder($kontaktId))->undoDelete();


        /*$update = new KontaktUpdate();
        $update->isDeleted = false;
        $update->updateById($kontaktId);*/

        (new UrlReferer())->redirect();

    }
}