<?php

namespace LuzernTourismus\MarketingProgramm\Page\Admin\Kategorie;

use LuzernTourismus\MarketingProgramm\Com\Form\KategorieForm;
use LuzernTourismus\MarketingProgramm\Parameter\KategorieParameter;
use LuzernTourismus\MarketingProgramm\Site\Admin\Kategorie\KategorieAdminSite;
use LuzernTourismus\MarketingProgramm\Site\Admin\Kategorie\KategorieEditSite;
use Nemundo\Admin\Com\Layout\AdminFlexboxLayout;
use Nemundo\Admin\Com\Title\AdminTitle;
use Nemundo\Com\Template\AbstractTemplateDocument;

class KategorieEditPage extends AbstractTemplateDocument
{
    public function getContent()
    {

        $layout = new AdminFlexboxLayout($this);

        $title = new AdminTitle($layout);
        $title->content = KategorieEditSite::$site->title;  // 'Katgorie editieren';

        $form = new KategorieForm($layout);
        $form->kategorieId = (new KategorieParameter())->getValue();
        $form->redirectSite = KategorieAdminSite::$site;


        return parent::getContent();
    }
}