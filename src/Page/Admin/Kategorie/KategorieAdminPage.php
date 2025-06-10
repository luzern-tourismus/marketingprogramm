<?php

namespace LuzernTourismus\MarketingProgramm\Page\Admin\Kategorie;

use LuzernTourismus\MarketingProgramm\Data\Kategorie\KategorieReader;
use LuzernTourismus\MarketingProgramm\Parameter\KategorieParameter;
use LuzernTourismus\MarketingProgramm\Site\Admin\Kategorie\KategorieActiveSite;
use LuzernTourismus\MarketingProgramm\Site\Admin\Kategorie\KategorieDeleteSite;
use LuzernTourismus\MarketingProgramm\Site\Admin\Kategorie\KategorieEditSite;
use LuzernTourismus\MarketingProgramm\Site\Admin\Kategorie\KategorieItemSite;
use LuzernTourismus\MarketingProgramm\Site\Admin\Kategorie\KategorieNewSite;
use Nemundo\Admin\Com\Button\AdminIconSiteButton;
use Nemundo\Admin\Com\Layout\AdminFlexboxLayout;
use Nemundo\Admin\Com\Table\AdminTable;
use Nemundo\Admin\Com\Table\AdminTableHeader;
use Nemundo\Admin\Com\Table\Row\AdminTableRow;
use Nemundo\Admin\Com\Title\AdminTitle;
use Nemundo\Com\Template\AbstractTemplateDocument;

class KategorieAdminPage extends AbstractTemplateDocument
{
    public function getContent()
    {

        $layout = new AdminFlexboxLayout($this);

        $title = new AdminTitle($layout);
        $title->content = 'Kategorie';

        $btn = new AdminIconSiteButton($layout);
        $btn->site = KategorieNewSite::$site;
        $btn->showTitle=false;

        $table = new AdminTable($layout);

        $header = new AdminTableHeader($table);
        $header->addText('Kategorie');
        $header->addText('Thema');
        $header->addEmpty(2);


        $reader = new KategorieReader();
        $reader->model->loadThema();
        $reader->addOrder($reader->model->kategorie);
        foreach ($reader->getData() as $kategorieRow) {

            $row = new AdminTableRow($table);
            $row->strikeThrough = $kategorieRow->isDeleted;


            $site = clone(KategorieItemSite::$site);
            $site->addParameter(new KategorieParameter($kategorieRow->id));
            $site->title = $kategorieRow->kategorie;
            $row->addSite($site);

            //$row->addText($kategorieRow->kategorie);



            $row->addText($kategorieRow->thema->thema);

            if (!$kategorieRow->isDeleted) {

            $site = clone(KategorieEditSite::$site);
            $site->addParameter(new KategorieParameter($kategorieRow->id));
            $row->addIconSite($site);

            $site = clone(KategorieDeleteSite::$site);
            $site->addParameter(new KategorieParameter($kategorieRow->id));
            $row->addIconSite($site);

            } else {

                $row->addEmpty();

                $site = clone(KategorieActiveSite::$site);
                $site->addParameter(new KategorieParameter($kategorieRow->id));
                $row->addIconSite($site);

            }


        }


        return parent::getContent();
    }
}