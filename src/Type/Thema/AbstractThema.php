<?php

namespace LuzernTourismus\MarketingProgramm\Type\Thema;

use Nemundo\Core\Base\AbstractBase;

abstract class AbstractThema extends AbstractBase
{

    public $id;

    public $thema;

    abstract protected function loadThema();


    public function __construct()
    {
        $this->loadThema();
    }

}