<?php

namespace LuzernTourismus\MarketingProgramm\Site\Admin\Aktivitaet;

use LuzernTourismus\MarketingProgramm\Business\Aktivitaet\AktivitaetBuilder;
use LuzernTourismus\MarketingProgramm\Data\Option\OptionDelete;
use LuzernTourismus\MarketingProgramm\Data\Option\OptionUpdate;
use LuzernTourismus\MarketingProgramm\Parameter\AktivitaetParameter;
use LuzernTourismus\MarketingProgramm\Parameter\OptionParameter;
use Nemundo\Admin\Site\AbstractDeleteIconSite;
use Nemundo\Core\Http\Url\UrlReferer;

class OptionDeleteSite extends AbstractDeleteIconSite
{

    /**
     * @var AktivitaetDeleteSite
     */
    public static $site;

    protected function loadSite()
    {
        //$this->title = 'AktivitaetNew';
        $this->url = 'option-delete';
        OptionDeleteSite::$site = $this;
    }

    public function loadContent()
    {

        $optionId = (new OptionParameter())->getValue();

        $update = new OptionUpdate();
        $update->isDeleted = true;
        $update->updateById($optionId);

        (new UrlReferer())->redirect();

    }
}