<?php

namespace LuzernTourismus\MarketingProgramm\Site\Admin\Kategorie;

use LuzernTourismus\MarketingProgramm\Business\Kategorie\KategorieBuilder;
use LuzernTourismus\MarketingProgramm\Data\Kategorie\KategorieUpdate;
use LuzernTourismus\MarketingProgramm\Parameter\KategorieParameter;
use Nemundo\Admin\Site\AbstractDeleteIconSite;
use Nemundo\Core\Http\Url\UrlReferer;

class KategorieDeleteSite extends AbstractDeleteIconSite
{

    /**
     * @var KategorieEditSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->title = 'Kategorie löschen';
        $this->url = 'kategorie-delete';

        KategorieDeleteSite::$site = $this;

    }

    public function loadContent()
    {

        $kategorieId = (new KategorieParameter())->getValue();

        (new KategorieBuilder($kategorieId))->delete();


        /*$update = new KategorieUpdate();
        $update->isDeleted = true;
        $update->updateById($kategorieId);*/

        (new UrlReferer())->redirect();

    }
}