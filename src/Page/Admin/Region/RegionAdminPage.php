<?php

namespace LuzernTourismus\MarketingProgramm\Page\Admin\Region;

use LuzernTourismus\MarketingProgramm\Com\ListBox\StatusListBox;
use LuzernTourismus\MarketingProgramm\Parameter\RegionParameter;
use LuzernTourismus\MarketingProgramm\Reader\Region\RegionDataReader;
use LuzernTourismus\MarketingProgramm\Site\Admin\Region\RegionAdminSite;
use LuzernTourismus\MarketingProgramm\Site\Admin\Region\RegionDeleteSite;
use LuzernTourismus\MarketingProgramm\Site\Admin\Region\RegionEditSite;
use LuzernTourismus\MarketingProgramm\Site\Admin\Region\RegionNewSite;
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
use Nemundo\Core\Debug\Debug;

class RegionAdminPage extends AbstractTemplateDocument
{
    public function getContent()
    {

        $layout = new AdminFlexboxLayout($this);

        $title = new AdminTitle($layout);
        $title->content = RegionAdminSite::$site->title;


        $btn = new AdminIconSiteButton($layout);
        $btn->site = RegionNewSite::$site;
        $btn->showTitle = false;


        $search = new AdminSearchForm($layout);

        $status = new StatusListBox($search);
        $status->searchMode = true;
        $status->submitOnChange = true;


        $table = new AdminTable($layout);

        $reader = new RegionDataReader();


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

        (new AdminTableHeader($table))
            ->addText($reader->model->region->label)
            ->addEmpty(3);

        foreach ($reader->getData() as $regionRow) {


            $row = new AdminTableRow($table);
            $row->strikeThrough = $regionRow->isDeleted;
            $row->addText($regionRow->region);

            $site = clone(RegionEditSite::$site);
            $site->addParameter(new RegionParameter($regionRow->id));
            $row->addIconSite($site);

            $site = clone(RegionDeleteSite::$site);
            $site->addParameter(new RegionParameter($regionRow->id));
            $row->addIconSite($site);


            /*$site = clone(Region PartnerItemSite::$site);
            $site->title = $regionRow->firma;
            $site->addParameter(new PartnerParameter($regionRow->id));
            $row->addSite($site);*/

            /*$site = clone(PartnerBestaetigungPdfSite::$site);
            $site->addParameter(new PartnerParameter($regionRow->id));
            $row->addIconSite($site);*/


            /*$row
                ->addText($partnerRow->firma);*/

            /*if (!$regionRow->isDeleted) {

                $site = clone(PartnerEditSite::$site);
                $site->addParameter(new PartnerParameter($regionRow->id));
                $row->addIconSite($site);

                $site = clone(PartnerDeleteSite::$site);
                $site->addParameter(new PartnerParameter($regionRow->id));
                $row->addIconSite($site);

            } else {

                $site = clone(PartnerActiveSite::$site);
                $site->addParameter(new PartnerParameter($regionRow->id));
                $row->addIconSite($site);

            }*/

        }

        return parent::getContent();
    }
}