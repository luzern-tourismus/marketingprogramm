<?php

namespace LuzernTourismus\MarketingProgramm\Type\Status;

use Nemundo\Core\Base\AbstractBase;

abstract class AbstractStatus extends AbstractBase
{

    public $id;

    public $status;

    abstract protected function loadStatus();

    public function __construct()
    {
        $this->loadStatus();
    }

}