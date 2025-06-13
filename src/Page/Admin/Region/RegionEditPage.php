<?php

namespace LuzernTourismus\MarketingProgramm\Page\Admin\Region;

use LuzernTourismus\MarketingProgramm\Com\Form\RegionForm;
use LuzernTourismus\MarketingProgramm\Data\Region\Region;
use LuzernTourismus\MarketingProgramm\Parameter\RegionParameter;
use LuzernTourismus\MarketingProgramm\Site\Admin\Region\RegionAdminSite;
use Nemundo\Admin\Com\Layout\AdminFlexboxLayout;
use Nemundo\Com\Template\AbstractTemplateDocument;

class RegionEditPage extends AbstractTemplateDocument
{
    public function getContent()
    {

        $layout = new AdminFlexboxLayout($this);

        $form = new RegionForm($layout);
        $form->dataId = (new RegionParameter())->getValue();
        $form->redirectSite = RegionAdminSite::$site;

        return parent::getContent();
    }
}