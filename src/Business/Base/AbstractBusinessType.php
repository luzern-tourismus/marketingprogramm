<?php

namespace LuzernTourismus\MarketingProgramm\Business\Base;

use Nemundo\Core\Base\AbstractBase;
use Nemundo\Core\Base\AbstractBaseClass;

abstract class AbstractBusinessType extends AbstractBaseClass
{

    //public $id;

    //public $phpClass;

    public $businessType;

    public $logView;


    abstract protected function loadType();

    public function __construct()
    {
        $this->loadType();
    }


}