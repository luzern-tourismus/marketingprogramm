<?php

namespace LuzernTourismus\MarketingProgramm\Page\Admin\Aktivitaet;

use LuzernTourismus\MarketingProgramm\Com\Form\OptionForm;
use LuzernTourismus\MarketingProgramm\Com\Table\AktivitaetLabelValueTable;
use LuzernTourismus\MarketingProgramm\Data\Option\OptionReader;
use LuzernTourismus\MarketingProgramm\Parameter\AktivitaetParameter;
use LuzernTourismus\MarketingProgramm\Parameter\OptionParameter;
use LuzernTourismus\MarketingProgramm\Site\Admin\Aktivitaet\AktivitaetItemSite;
use Nemundo\Admin\Com\Layout\AdminFlexboxLayout;
use Nemundo\Admin\Com\Title\AdminTitle;
use Nemundo\Com\Template\AbstractTemplateDocument;

class OptionEditPage extends AbstractTemplateDocument
{
    public function getContent()
    {

        $layout = new AdminFlexboxLayout($this);

        $title = new AdminTitle($layout);
        $title->content = 'Option editieren';

        $optionId =  (new OptionParameter())->getValue();
        $optionRow = (new OptionReader())->getRowById($optionId);

        $table = new AktivitaetLabelValueTable($layout);
        $table->fromAktivitaetId($optionRow->aktivitaetId);


        $site = clone(AktivitaetItemSite::$site);
        $site->addParameter(new AktivitaetParameter($optionRow->aktivitaetId) );

        $form = new OptionForm($layout);
        $form->dataId =$optionId;
        $form->redirectSite= $site;


        return parent::getContent();
    }
}