<?php

namespace LuzernTourismus\MarketingProgramm\Business\Base;

use Nemundo\Core\Base\AbstractBase;

abstract class AbstractBuilder extends AbstractBase
{

    protected $id;

    public function __construct($id=null)
    {
        $this->id = $id;
    }

    //abstract public function create();


    public function build()
    {

        $this->onCheck();

        if ($this->id == null) {
            $this->onCreate();
        } else {
            $this->onUpdate();
        }

    }


    protected function onCheck()
    {

    }


    protected function onCreate()
    {

    }

    protected function onUpdate()
    {

    }


}