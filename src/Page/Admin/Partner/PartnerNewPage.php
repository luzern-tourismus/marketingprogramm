<?php

namespace LuzernTourismus\MarketingProgramm\Page\Admin\Partner;

use LuzernTourismus\MarketingProgramm\Com\Form\PartnerForm;
use LuzernTourismus\MarketingProgramm\Site\Admin\Partner\PartnerAdminSite;
use Nemundo\Admin\Com\Layout\AdminFlexboxLayout;
use Nemundo\Admin\Com\Title\AdminTitle;
use Nemundo\Com\Template\AbstractTemplateDocument;

class PartnerNewPage extends AbstractTemplateDocument
{
    public function getContent()
    {

        $layout = new AdminFlexboxLayout($this);

        $title = new AdminTitle($layout);
        $title->content = 'Neuer Partner';

        $form = new PartnerForm($layout);
        $form->redirectSite = PartnerAdminSite::$site;


        return parent::getContent();
    }
}