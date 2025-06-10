<?php

namespace LuzernTourismus\MarketingProgramm\ChangeLog\Operation;

class UndoDeleteOperation extends AbstractOperation
{

    protected function loadOperation() {
        $this->id = 4;
        $this->operation = 'undo delete';
    }

}