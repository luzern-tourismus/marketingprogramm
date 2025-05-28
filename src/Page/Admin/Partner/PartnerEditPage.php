<?php

namespace LuzernTourismus\MarketingProgramm\Page\Admin\Partner;

use LuzernTourismus\MarketingProgramm\Com\Form\PartnerForm;
use LuzernTourismus\MarketingProgramm\Parameter\PartnerParameter;
use LuzernTourismus\MarketingProgramm\Site\Admin\Partner\PartnerAdminSite;
use Nemundo\Admin\Com\Layout\AdminFlexboxLayout;
use Nemundo\Admin\Com\Title\AdminTitle;
use Nemundo\Com\Template\AbstractTemplateDocument;

class PartnerEditPage extends AbstractTemplateDocument
{
    public function getContent()
    {

        $layout = new AdminFlexboxLayout($this);

        $title = new AdminTitle($layout);
        $title->content = 'Partner bearbeiten';

        $form = new PartnerForm($layout);
        $form->partnerId= (new PartnerParameter())->getValue();
        $form->redirectSite = PartnerAdminSite::$site;

        return parent::getContent();
    }
}