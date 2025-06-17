<?php

namespace LuzernTourismus\MarketingProgramm\ChangeLog\Operation;

class CreateOperation extends AbstractOperation
{

    protected function loadOperation() {
        $this->id = 1;
        $this->operation = 'Create';
    }

}