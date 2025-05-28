<?php

namespace LuzernTourismus\MarketingProgramm\Usergroup;

use Nemundo\User\Usergroup\AbstractUsergroup;

class PartnerUsergroup extends AbstractUsergroup
{
    protected function loadUsergroup()
    {
        $this->usergroup = 'Partner';
        $this->usergroupId = 'c2b0fbed-7269-4663-97bc-de9b9c704165';
    }
}