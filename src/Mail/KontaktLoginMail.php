<?php

namespace LuzernTourismus\MarketingProgramm\Mail;

use Nemundo\User\Mail\AbstractUserLoginMailContainer;

class KontaktLoginMail extends AbstractUserLoginMailContainer
{

    protected function loadMailContainer()
    {

        $this->subject='Marketingprogramm Login';


    }

}