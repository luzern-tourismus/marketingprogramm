<?php

namespace LuzernTourismus\MarketingProgramm\Usergroup;

use Nemundo\User\Usergroup\AbstractUsergroup;

class KontaktUsergroup extends AbstractUsergroup
{
    protected function loadUsergroup()
    {
        $this->usergroup = 'Kontakt';
        $this->usergroupId = '618aa5b0-35bb-4c12-8f73-b6b75bd0ab3a';
    }
}