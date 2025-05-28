<?php

namespace LuzernTourismus\MarketingProgramm\Page\Admin\Anmeldung;

use LuzernTourismus\MarketingProgramm\Com\ListBox\AktivitaetListBox;
use LuzernTourismus\MarketingProgramm\Com\ListBox\PartnerListBox;
use LuzernTourismus\MarketingProgramm\Data\Anmeldung\AnmeldungReader;
use Nemundo\Admin\Com\Form\AdminSearchForm;
use Nemundo\Admin\Com\Layout\AdminFlexboxLayout;
use Nemundo\Admin\Com\Table\AdminTable;
use Nemundo\Admin\Com\Table\AdminTableHeader;
use Nemundo\Admin\Com\Table\Row\AdminTableRow;
use Nemundo\Admin\Com\Title\AdminTitle;
use Nemundo\Com\Template\AbstractTemplateDocument;

class AnmeldungAdminPage extends AbstractTemplateDocument
{
    public function getContent()
    {

        $layout = new AdminFlexboxLayout($this);

        $title = new AdminTitle($layout);
        $title->content = 'Anmeldungen';

        $search = new AdminSearchForm($layout);

        $partner = new PartnerListBox($search);
        $partner->searchMode=true;
        $partner->submitOnChange=true;

        $aktivitaet = new AktivitaetListBox($search);
        $aktivitaet->searchMode=true;
        $aktivitaet->submitOnChange=true;



        $table = new AdminTable($layout);

        $reader = new AnmeldungReader();
        $reader->model->loadPartner()->loadAktivitaet();

        if ($partner->hasValue()) {
            $reader->filter->andEqual($reader->model->partnerId,$partner->getValue());
        }

        if ($aktivitaet->hasValue()) {
            $reader->filter->andEqual($reader->model->aktivitaetId,$aktivitaet->getValue());
        }


        (new AdminTableHeader($table))
            ->addText($reader->model->partner->label)
            ->addText($reader->model->aktivitaet->label);


        foreach ($reader->getData() as $anmeldungRow) {

            (new AdminTableRow($table))
                ->addText($anmeldungRow->partner->firma)
                ->addText($anmeldungRow->aktivitaet->aktivitaet);


        }


        return parent::getContent();
    }
}