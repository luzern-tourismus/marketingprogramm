<?php

namespace LuzernTourismus\MarketingProgramm\Type\Status;

class ActiveStatus extends AbstractStatus
{

    protected function loadStatus()
    {
        $this->id = 1;
        $this->status = 'Aktive Elemente';
    }

}