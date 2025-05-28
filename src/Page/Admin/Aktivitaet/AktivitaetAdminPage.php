<?php

namespace LuzernTourismus\MarketingProgramm\Page\Admin\Aktivitaet;

use LuzernTourismus\MarketingProgramm\Data\Aktivitaet\AktivitaetReader;
use LuzernTourismus\MarketingProgramm\Parameter\AktivitaetParameter;
use LuzernTourismus\MarketingProgramm\Site\Admin\Aktivitaet\AktivitaetActiveSite;
use LuzernTourismus\MarketingProgramm\Site\Admin\Aktivitaet\AktivitaetDeleteSite;
use LuzernTourismus\MarketingProgramm\Site\Admin\Aktivitaet\AktivitaetEditSite;
use LuzernTourismus\MarketingProgramm\Site\Admin\Aktivitaet\AktivitaetItemSite;
use LuzernTourismus\MarketingProgramm\Site\Admin\Aktivitaet\AktivitaetNewSite;
use Nemundo\Admin\Com\Button\AdminIconSiteButton;
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
        $title->content = 'Aktivität';


        $btn = new AdminIconSiteButton($layout);
        $btn->site = AktivitaetNewSite::$site;
        $btn->showTitle=false;


        $table = new AdminTable($layout);

        $reader = new AktivitaetReader();
        $reader->model->loadKategorie()->loadKontakt();
        $reader->model->kategorie->loadThema();

        (new AdminTableHeader($table))
            ->addText($reader->model->aktivitaet->label)
            ->addText($reader->model->kategorie->label)
            ->addEmpty(2);


        foreach ($reader->getData() as $aktivitaetRow) {

            $row = new AdminTableRow($table);
            $row->strikeThrough = $aktivitaetRow->isDeleted;

            $site = clone(AktivitaetItemSite::$site);
            $site->addParameter(new AktivitaetParameter($aktivitaetRow->id));
            $site->title = $aktivitaetRow->aktivitaet;
            $row->addSite($site);

            $row->addText($aktivitaetRow->kategorie->kategorie);
            //$row->addText($aktivitaetRow->datum);



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

                $row->addEmpty();

            }

        }

        return parent::getContent();
        
    }
}