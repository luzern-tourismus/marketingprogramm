<?php

namespace LuzernTourismus\MarketingProgramm\Page\Admin\Kategorie;

use LuzernTourismus\MarketingProgramm\Com\ListBox\StatusListBox;
use LuzernTourismus\MarketingProgramm\Parameter\KategorieParameter;
use LuzernTourismus\MarketingProgramm\Reader\Kategorie\KategorieDataReader;
use LuzernTourismus\MarketingProgramm\Site\Admin\Kategorie\KategorieActiveSite;
use LuzernTourismus\MarketingProgramm\Site\Admin\Kategorie\KategorieDeleteSite;
use LuzernTourismus\MarketingProgramm\Site\Admin\Kategorie\KategorieEditSite;
use LuzernTourismus\MarketingProgramm\Site\Admin\Kategorie\KategorieItemSite;
use LuzernTourismus\MarketingProgramm\Site\Admin\Kategorie\KategorieNewSite;
use LuzernTourismus\MarketingProgramm\Type\Status\ActiveDeletedStatus;
use LuzernTourismus\MarketingProgramm\Type\Status\ActiveStatus;
use LuzernTourismus\MarketingProgramm\Type\Status\DeletedStatus;
use Nemundo\Admin\Com\Button\AdminIconSiteButton;
use Nemundo\Admin\Com\Form\AdminSearchForm;
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
        $btn->showTitle = false;


        $search = new AdminSearchForm($layout);

        $status = new StatusListBox($search);
        $status->searchMode = true;
        $status->submitOnChange = true;



        $table = new AdminTable($layout);


        $reader = new KategorieDataReader();
        //$reader->filter->andEqual($reader->model->isDeleted,false);

        if ($status->hasValue()) {

            if ($status->getValue() == (new ActiveStatus())->id) {
                $reader->filter->andEqual($reader->model->isDeleted, false);
            }

            if ($status->getValue() == (new DeletedStatus())->id) {
                $reader->filter->andEqual($reader->model->isDeleted, true);
                //(new Debug())->write('deleted');
            }

            if ($status->getValue() == (new ActiveDeletedStatus())->id) {
                //$reader->filter->andEqual($reader->model->isDeleted,true);
            }

        } else {
            $reader->filter->andEqual($reader->model->isDeleted, false);
        }


        $reader->addOrder($reader->model->kategorie);


        (new AdminTableHeader($table))
            ->addText($reader->model->kategorie->label)
            ->addText($reader->model->region->label)
            ->addText($reader->model->thema->label)
            ->addEmpty(3);


        foreach ($reader->getData() as $kategorieRow) {

            $row = new AdminTableRow($table);
            $row->strikeThrough = $kategorieRow->isDeleted;

            $site = clone(KategorieItemSite::$site);
            $site->addParameter(new KategorieParameter($kategorieRow->id));
            $site->title = $kategorieRow->kategorie;
            $row->addSite($site);

            //$row->addText($kategorieRow->kategorie);

            $row->addText($kategorieRow->region->region);
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