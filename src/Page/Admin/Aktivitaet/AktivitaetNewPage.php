<?php

namespace LuzernTourismus\MarketingProgramm\Page\Admin\Aktivitaet;

use LuzernTourismus\MarketingProgramm\Com\Form\AktivitaetForm;
use LuzernTourismus\MarketingProgramm\Site\Admin\Aktivitaet\AktivitaetAdminSite;
use LuzernTourismus\MarketingProgramm\Site\AktivitaetSite;
use LuzernTourismus\MarketingProgramm\Template\MarketingProgrammTemplate;
use Nemundo\Admin\Com\Layout\AdminFlexboxLayout;
use Nemundo\Admin\Com\Title\AdminTitle;
use Nemundo\Com\Template\AbstractTemplateDocument;

class AktivitaetNewPage extends AbstractTemplateDocument
{
    public function getContent()
    {




        $layout = new AdminFlexboxLayout($this);

        $title = new AdminTitle($layout);
        $title->content = 'Neue Aktivität';

        $form = new AktivitaetForm($layout);
        $form->redirectSite = AktivitaetAdminSite::$site;


        return parent::getContent();
    }
}