<?php

namespace LuzernTourismus\MarketingProgramm\ChangeLog\Operation;

class UpdateOperation extends AbstractOperation
{

    protected function loadOperation() {
        $this->id = 2;
        $this->operation = 'update';
    }

}