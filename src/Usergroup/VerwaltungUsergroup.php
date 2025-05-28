<?php

namespace LuzernTourismus\MarketingProgramm\Usergroup;

use Nemundo\User\Usergroup\AbstractUsergroup;

class VerwaltungUsergroup extends AbstractUsergroup
{
    protected function loadUsergroup()
    {
        $this->usergroup = 'Verwaltung';
        $this->usergroupId = 'de10b6e2-dd7c-4dd1-a73e-815d488f229a';
    }
}