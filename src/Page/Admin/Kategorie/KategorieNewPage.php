<?php

namespace LuzernTourismus\MarketingProgramm\Page\Admin\Kategorie;

use LuzernTourismus\MarketingProgramm\Com\Form\KategorieForm;
use LuzernTourismus\MarketingProgramm\Site\Admin\Kategorie\KategorieAdminSite;
use Nemundo\Admin\Com\Layout\AdminFlexboxLayout;
use Nemundo\Admin\Com\Title\AdminTitle;
use Nemundo\Com\Template\AbstractTemplateDocument;

class KategorieNewPage extends AbstractTemplateDocument
{
    public function getContent()
    {

        $layout = new AdminFlexboxLayout($this);

        $title = new AdminTitle($layout);
        $title->content = 'Neue Katgorie';

        $form = new KategorieForm($layout);
        $form->redirectSite = KategorieAdminSite::$site;

        return parent::getContent();
    }
}