<?php

namespace LuzernTourismus\MarketingProgramm\Type\Anrede;

class HerrAnrede extends AbstractAnrede
{

    protected function loadAnrede()
    {

        $this->id = 1;
        $this->anrede = 'Herr';

    }

}