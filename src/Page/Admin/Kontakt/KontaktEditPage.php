<?php

namespace LuzernTourismus\MarketingProgramm\Page\Admin\Kontakt;

use LuzernTourismus\MarketingProgramm\Com\Form\KontaktForm;
use LuzernTourismus\MarketingProgramm\Parameter\KontaktParameter;
use LuzernTourismus\MarketingProgramm\Site\Admin\Kontakt\KontaktAdminSite;
use Nemundo\Admin\Com\Layout\AdminFlexboxLayout;
use Nemundo\Admin\Com\Title\AdminTitle;
use Nemundo\Com\Template\AbstractTemplateDocument;

class KontaktEditPage extends AbstractTemplateDocument
{
    public function getContent()
    {

        $layout = new AdminFlexboxLayout($this);

        $title= new AdminTitle($layout);
        $title->content = 'Kontakt editieren';

        $form = new KontaktForm($layout);
        $form->kontaktId = (new KontaktParameter())->getValue();
        $form->redirectSite = KontaktAdminSite::$site;


        return parent::getContent();
    }
}