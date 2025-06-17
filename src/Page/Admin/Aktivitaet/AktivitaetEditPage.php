<?php

namespace LuzernTourismus\MarketingProgramm\Page\Admin\Aktivitaet;

use LuzernTourismus\MarketingProgramm\Com\Form\AktivitaetForm;
use LuzernTourismus\MarketingProgramm\Parameter\AktivitaetParameter;
use LuzernTourismus\MarketingProgramm\Site\Admin\Aktivitaet\AktivitaetAdminSite;
use Nemundo\Admin\Com\Layout\AdminFlexboxLayout;
use Nemundo\Admin\Com\Title\AdminTitle;
use Nemundo\Com\Template\AbstractTemplateDocument;

class AktivitaetEditPage extends AbstractTemplateDocument
{
    public function getContent()
    {

        $aktivitaetId = (new AktivitaetParameter())->getValue();

        $layout = new AdminFlexboxLayout($this);

        $title = new AdminTitle($layout);
        $title->content = 'Aktivität editieren';

        $form = new AktivitaetForm($layout);
        $form->dataId = $aktivitaetId;
        $form->refererRedirect=true;
        //$form->redirectSite = AktivitaetAdminSite::$site;

        return parent::getContent();
    }
}