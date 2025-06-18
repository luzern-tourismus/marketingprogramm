<?php

namespace LuzernTourismus\MarketingProgramm\Type\Status;

class ActiveDeletedStatus extends AbstractStatus
{

    protected function loadStatus()
    {
        $this->id = 3;
        $this->status = 'Aktive und gelöschte Elemente';
    }

}