<?php

namespace LuzernTourismus\MarketingProgramm\Site\Admin\Aktivitaet;

use LuzernTourismus\MarketingProgramm\Data\Aktivitaet\AktivitaetUpdate;
use LuzernTourismus\MarketingProgramm\Page\Admin\Aktivitaet\AktivitaetNewPage;
use LuzernTourismus\MarketingProgramm\Parameter\AktivitaetParameter;
use Nemundo\Admin\Site\AbstractDeleteIconSite;
use Nemundo\Admin\Site\AbstractNewIconSite;
use Nemundo\Core\Http\Url\UrlReferer;

class AktivitaetDeleteSite extends AbstractDeleteIconSite
{

    /**
     * @var AktivitaetDeleteSite
     */
    public static $site;

    protected function loadSite()
    {
        //$this->title = 'AktivitaetNew';
        $this->url = 'aktivitaet-delete';
        AktivitaetDeleteSite::$site = $this;
    }

    public function loadContent()
    {

        $aktivitaetId = (new AktivitaetParameter())->getValue();

        $update = new AktivitaetUpdate();
        $update->isDeleted=true;
        $update->updateById($aktivitaetId);

        (new UrlReferer())->redirect();

    }
}