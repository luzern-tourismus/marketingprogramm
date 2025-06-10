<?php

namespace LuzernTourismus\MarketingProgramm\ChangeLog\Operation;

use Nemundo\Core\Base\AbstractBase;

abstract class AbstractOperation extends AbstractBase
{

    public $id;

    public $operation;

    abstract protected function loadOperation();

    public function __construct()
    {
        $this->loadOperation();
    }

}