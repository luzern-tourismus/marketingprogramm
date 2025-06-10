<?php

namespace LuzernTourismus\MarketingProgramm\ChangeLog\Operation;

class DeleteOperation extends AbstractOperation
{

    protected function loadOperation() {
        $this->id = 3;
        $this->operation = 'delete';
    }

}