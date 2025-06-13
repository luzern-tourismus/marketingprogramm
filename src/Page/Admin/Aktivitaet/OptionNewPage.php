<?php

namespace LuzernTourismus\MarketingProgramm\Page\Admin\Aktivitaet;

use LuzernTourismus\MarketingProgramm\Com\Form\OptionForm;
use LuzernTourismus\MarketingProgramm\Data\Option\OptionReader;
use LuzernTourismus\MarketingProgramm\Parameter\AktivitaetParameter;
use LuzernTourismus\MarketingProgramm\Parameter\OptionParameter;
use LuzernTourismus\MarketingProgramm\Site\Admin\Aktivitaet\AktivitaetItemSite;
use Nemundo\Admin\Com\Layout\AdminFlexboxLayout;
use Nemundo\Com\Template\AbstractTemplateDocument;

class OptionNewPage extends AbstractTemplateDocument
{
    public function getContent()
    {

        $layout = new AdminFlexboxLayout($this);

        //$optionId =  (new OptionParameter())->getValue();
        //$optionRow = (new OptionReader())->getRowById($optionId);

        $aktivitaetId = (new AktivitaetParameter())->getValue();

        $site = clone(AktivitaetItemSite::$site);
        $site->addParameter(new AktivitaetParameter() );

        $form = new OptionForm($layout);
        $form->aktivitaetId = $aktivitaetId;
        //$form->dataId =$optionId;
        $form->redirectSite= $site;


        return parent::getContent();
    }
}