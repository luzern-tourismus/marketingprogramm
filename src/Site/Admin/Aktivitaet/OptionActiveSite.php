<?php

namespace LuzernTourismus\MarketingProgramm\Site\Admin\Aktivitaet;

use LuzernTourismus\MarketingProgramm\Data\Option\OptionUpdate;
use LuzernTourismus\MarketingProgramm\Parameter\OptionParameter;
use Nemundo\Admin\Site\AbstractActiveIconSite;
use Nemundo\Admin\Site\AbstractDeleteIconSite;
use Nemundo\Core\Http\Url\UrlReferer;

class OptionActiveSite extends AbstractActiveIconSite
{

    /**
     * @var OptionActiveSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->title = 'Active Option';
        $this->url = 'option-active';
        OptionActiveSite::$site = $this;
    }

    public function loadContent()
    {

        $optionId = (new OptionParameter())->getValue();

        $update = new OptionUpdate();
        $update->isDeleted = false;
        $update->updateById($optionId);

        (new UrlReferer())->redirect();

    }
}