<?php

namespace LuzernTourismus\MarketingProgramm\Site\Admin\ChangeLog;

use LuzernTourismus\MarketingProgramm\Page\Admin\ChangeLog\ChangeLogPage;
use Nemundo\App\Application\Usergroup\AdminUsergroup;
use Nemundo\Web\Site\AbstractSite;

class ChangeLogSite extends AbstractSite
{
    protected function loadSite()
    {
        $this->title = 'Change Log';
        $this->url = 'change-log';
        $this->restricted=true;
        $this->addRestrictedUsergroup(new AdminUsergroup());
    }

    public function loadContent()
    {
        (new ChangeLogPage())->render();
    }
}