<?php

namespace LuzernTourismus\MarketingProgramm\Page\Admin\Region;

use LuzernTourismus\MarketingProgramm\Com\Form\RegionForm;
use LuzernTourismus\MarketingProgramm\Site\Admin\Region\RegionAdminSite;
use Nemundo\Admin\Com\Layout\AdminFlexboxLayout;
use Nemundo\Com\Template\AbstractTemplateDocument;

class RegionNewPage extends AbstractTemplateDocument
{
    public function getContent()
    {

        $layout = new AdminFlexboxLayout($this);

        $form = new RegionForm($layout);
        $form->redirectSite = RegionAdminSite::$site;


        return parent::getContent();
    }
}