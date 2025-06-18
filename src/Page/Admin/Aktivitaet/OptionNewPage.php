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

class OptionNewPage extends AbstractTemplateDocument
{
    public function getContent()
    {

        $layout = new AdminFlexboxLayout($this);

        $title = new AdminTitle($layout);
        $title->content = 'Neue Option';

        $aktivitaetId = (new AktivitaetParameter())->getValue();

        $table = new AktivitaetLabelValueTable($this);
        $table->fromAktivitaetId($aktivitaetId);  // aktivitaetRow= $aktivitaetRow;*/


        $site = clone(AktivitaetItemSite::$site);
        $site->addParameter(new AktivitaetParameter() );

        $form = new OptionForm($layout);
        $form->aktivitaetId = $aktivitaetId;
        $form->redirectSite= $site;

        return parent::getContent();
    }
}