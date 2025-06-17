<?php

namespace LuzernTourismus\MarketingProgramm\Page\Admin\Aktivitaet;

use LuzernTourismus\MarketingProgramm\Com\ListBox\KategorieListBox;
use LuzernTourismus\MarketingProgramm\Com\ListBox\KontaktListBox;
use LuzernTourismus\MarketingProgramm\Com\ListBox\PartnerListBox;
use LuzernTourismus\MarketingProgramm\Com\ListBox\ThemaListBox;
use LuzernTourismus\MarketingProgramm\Parameter\AktivitaetParameter;
use LuzernTourismus\MarketingProgramm\Reader\Aktivitaet\AktivitaetDataReader;
use LuzernTourismus\MarketingProgramm\Site\Admin\Aktivitaet\AktivitaetActiveSite;
use LuzernTourismus\MarketingProgramm\Site\Admin\Aktivitaet\AktivitaetAdminSite;
use LuzernTourismus\MarketingProgramm\Site\Admin\Aktivitaet\AktivitaetDeleteSite;
use LuzernTourismus\MarketingProgramm\Site\Admin\Aktivitaet\AktivitaetEditSite;
use LuzernTourismus\MarketingProgramm\Site\Admin\Aktivitaet\AktivitaetItemSite;
use LuzernTourismus\MarketingProgramm\Site\Admin\Aktivitaet\AktivitaetNewSite;
use Nemundo\Admin\Com\Button\AdminIconSiteButton;
use Nemundo\Admin\Com\Form\AdminSearchForm;
use Nemundo\Admin\Com\Layout\AdminFlexboxLayout;
use Nemundo\Admin\Com\Table\AdminTable;
use Nemundo\Admin\Com\Table\AdminTableHeader;
use Nemundo\Admin\Com\Table\Row\AdminTableRow;
use Nemundo\Admin\Com\Title\AdminTitle;
use Nemundo\Com\Template\AbstractTemplateDocument;

class AktivitaetAdminPage extends AbstractTemplateDocument
{
    public function getContent()
    {

        $layout = new AdminFlexboxLayout($this);

        $title = new AdminTitle($layout);
        $title->content = AktivitaetAdminSite::$site->title;


        $search = new AdminSearchForm($layout);

        $thema = new ThemaListBox($search);
        $thema->searchMode = true;
        $thema->submitOnChange = true;

        $kategorie = new KategorieListBox($search);
        $kategorie->searchMode = true;
        $kategorie->submitOnChange = true;

        $kontakt = new KontaktListBox($search);
        $kontakt->searchMode = true;
        $kontakt->submitOnChange = true;


        $btn = new AdminIconSiteButton($layout);
        $btn->site = AktivitaetNewSite::$site;
        $btn->showTitle = false;


        $table = new AdminTable($layout);

        $reader = new AktivitaetDataReader();
        $reader
            ->filterByThema($thema->getValue())
            ->filterByKategorie($kategorie->getValue())
            ->filterByKontakt($kontakt->getValue())
            ->orderByAktivitaet();


        /*$reader->model->loadKategorie()->loadKontakt();
        $reader->model->kategorie->loadThema();*/


        (new AdminTableHeader($table))
            ->addText($reader->model->aktivitaet->label)
            ->addText($reader->model->kategorie->thema->label)
            ->addText($reader->model->kategorie->label)
            ->addText($reader->model->kontakt->label)
            ->addEmpty(2);


        foreach ($reader->getData() as $aktivitaetRow) {

            $row = new AdminTableRow($table);
            $row->strikeThrough = $aktivitaetRow->isDeleted;

            $site = clone(AktivitaetItemSite::$site);
            $site->addParameter(new AktivitaetParameter($aktivitaetRow->id));
            $site->title = $aktivitaetRow->aktivitaet;
            $row->addSite($site);

            $row->addText($aktivitaetRow->kategorie->thema->thema);
            $row->addText($aktivitaetRow->kategorie->kategorie);
            $row->addText($aktivitaetRow->kontakt->getVornameNachname());

            $site = clone(AktivitaetEditSite::$site);
            $site->addParameter(new AktivitaetParameter($aktivitaetRow->id));
            $row->addIconSite($site);

            if (!$aktivitaetRow->isDeleted) {

                $site = clone(AktivitaetDeleteSite::$site);
                $site->addParameter(new AktivitaetParameter($aktivitaetRow->id));
                $row->addIconSite($site);

            } else {

                $site = clone(AktivitaetActiveSite::$site);
                $site->addParameter(new AktivitaetParameter($aktivitaetRow->id));
                $row->addIconSite($site);

                //$row->addEmpty();

            }

        }

        return parent::getContent();

    }
}