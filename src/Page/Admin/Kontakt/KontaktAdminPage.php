<?php

namespace LuzernTourismus\MarketingProgramm\Page\Admin\Kontakt;

use LuzernTourismus\MarketingProgramm\Data\Kontakt\KontaktReader;
use LuzernTourismus\MarketingProgramm\Parameter\KontaktParameter;
use LuzernTourismus\MarketingProgramm\Site\Admin\Kontakt\KontaktActiveSite;
use LuzernTourismus\MarketingProgramm\Site\Admin\Kontakt\KontaktDeleteSite;
use LuzernTourismus\MarketingProgramm\Site\Admin\Kontakt\KontaktEditSite;
use LuzernTourismus\MarketingProgramm\Site\Admin\Kontakt\KontaktNewSite;
use Nemundo\Admin\Com\Button\AdminIconSiteButton;
use Nemundo\Admin\Com\Layout\AdminFlexboxLayout;
use Nemundo\Admin\Com\Table\AdminTable;
use Nemundo\Admin\Com\Table\AdminTableHeader;
use Nemundo\Admin\Com\Table\Row\AdminTableRow;
use Nemundo\Admin\Com\Title\AdminTitle;
use Nemundo\Com\Template\AbstractTemplateDocument;

class KontaktAdminPage extends AbstractTemplateDocument
{
    public function getContent()
    {

        $layout = new AdminFlexboxLayout($this);

        $title = new AdminTitle($layout);
        $title->content = 'Kontakt';

        $btn = new AdminIconSiteButton($layout);
        $btn->site = KontaktNewSite::$site;
        $btn->showTitle = false;

        $table = new AdminTable($layout);

        $reader = new KontaktReader();

        (new AdminTableHeader($table))
            ->addText($reader->model->nachname->label)
            ->addText($reader->model->vorname->label)
            ->addText($reader->model->telefon->label)
            ->addText($reader->model->email->label)
            ->addEmpty(2);


        foreach ($reader->getData() as $kontaktRow) {

            $site = clone(KontaktEditSite::$site);
            $site->addParameter(new KontaktParameter($kontaktRow->id));

            $row = new AdminTableRow($table);
            $row->strikeThrough = $kontaktRow->isDeleted;

            $row
                ->addText($kontaktRow->nachname)
                ->addText($kontaktRow->vorname)
                ->addText($kontaktRow->telefon)
                ->addText($kontaktRow->email)
                ->addEditSite($site);

            if (!$kontaktRow->isDeleted) {

                $site = clone(KontaktDeleteSite::$site);
                $site->addParameter(new KontaktParameter($kontaktRow->id));
                $row->addIconSite($site);

            } else {

                $site = clone(KontaktActiveSite::$site);
                $site->addParameter(new KontaktParameter($kontaktRow->id));
                $row->addIconSite($site);

            }


        }


        return parent::getContent();
    }
}