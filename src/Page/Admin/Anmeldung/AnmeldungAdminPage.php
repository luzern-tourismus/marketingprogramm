<?php

namespace LuzernTourismus\MarketingProgramm\Page\Admin\Anmeldung;

use LuzernTourismus\MarketingProgramm\Com\ListBox\AktivitaetListBox;
use LuzernTourismus\MarketingProgramm\Com\ListBox\PartnerListBox;
use LuzernTourismus\MarketingProgramm\Data\Anmeldung\AnmeldungReader;
use LuzernTourismus\MarketingProgramm\Site\Admin\Anmeldung\AnmeldungExcelExportSite;
use Nemundo\Admin\Com\Button\AdminIconSiteButton;
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


        $btn = new AdminIconSiteButton($layout);
        $btn->site = AnmeldungExcelExportSite::$site;

        $table = new AdminTable($layout);

        $reader = new AnmeldungReader();
        $reader->model->loadPartner()->loadOption();
        $reader->model->option->loadAktivitaet();

        if ($partner->hasValue()) {
            $reader->filter->andEqual($reader->model->partnerId,$partner->getValue());
        }

        if ($aktivitaet->hasValue()) {
            $reader->filter->andEqual($reader->model->option->aktivitaetId,$aktivitaet->getValue());
        }


        (new AdminTableHeader($table))
            ->addText($reader->model->partner->label)
            ->addText($reader->model->option->aktivitaet->label)
            ->addText($reader->model->option->option->label)
            ->addText($reader->model->option->preis->label);


        foreach ($reader->getData() as $anmeldungRow) {

            (new AdminTableRow($table))
                ->addText($anmeldungRow->partner->firma)
                ->addText($anmeldungRow->option->aktivitaet->aktivitaet)
                ->addText($anmeldungRow->option->option)
                ->addText($anmeldungRow->option->preis);


        }


        return parent::getContent();
    }
}