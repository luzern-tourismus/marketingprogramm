<?php

namespace LuzernTourismus\MarketingProgramm\Type\Anrede;

use Nemundo\Core\Base\AbstractBase;

abstract class AbstractAnrede extends AbstractBase
{

    public $id;

    public $anrede;

    abstract protected function loadAnrede();

    public function __construct()
    {
        $this->loadAnrede();
    }

}