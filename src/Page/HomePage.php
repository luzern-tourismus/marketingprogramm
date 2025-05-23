<?php

namespace LuzernTourismus\MarketingProgramm\Page;

use LuzernTourismus\MarketingProgramm\Template\MarketingProgrammTemplate;
use Nemundo\Admin\Com\Title\AdminTitle;
use Nemundo\App\UserAction\Com\Form\LoginForm;

class HomePage extends MarketingProgrammTemplate
{
    public function getContent()
    {

        $title = new AdminTitle($this);
        $title->content = 'LTAG Marketingprogramm';

        $form = new LoginForm($this);

        return parent::getContent();
    }
}