<?php

namespace LuzernTourismus\MarketingProgramm\Type\Status;

class DeletedStatus extends AbstractStatus
{

    protected function loadStatus()
    {
        $this->id = 2;
        $this->status = 'Gelöschte Elemente';
    }

}