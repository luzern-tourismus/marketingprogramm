<?php

namespace LuzernTourismus\MarketingProgramm\Site\Admin\Aktivitaet;

use LuzernTourismus\MarketingProgramm\Business\Aktivitaet\AktivitaetBuilder;
use LuzernTourismus\MarketingProgramm\Data\Aktivitaet\AktivitaetUpdate;
use LuzernTourismus\MarketingProgramm\Parameter\AktivitaetParameter;
use Nemundo\Admin\Site\AbstractActiveIconSite;
use Nemundo\Admin\Site\AbstractDeleteIconSite;
use Nemundo\Core\Http\Url\UrlReferer;

class AktivitaetActiveSite extends AbstractActiveIconSite
{

    /**
     * @var AktivitaetActiveSite
     */
    public static $site;

    protected function loadSite()
    {
        //$this->title = 'AktivitaetNew';
        $this->url = 'aktivitaet-active';
        AktivitaetActiveSite::$site = $this;
    }

    public function loadContent()
    {

        $aktivitaetId = (new AktivitaetParameter())->getValue();
        (new AktivitaetBuilder($aktivitaetId))->undoDelete();

        /*$update = new AktivitaetUpdate();
        $update->isDeleted=false;
        $update->updateById($aktivitaetId);*/

        (new UrlReferer())->redirect();

    }
}