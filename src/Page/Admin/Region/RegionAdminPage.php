<?php

namespace LuzernTourismus\MarketingProgramm\Page\Admin\Region;

use LuzernTourismus\MarketingProgramm\Parameter\PartnerParameter;
use LuzernTourismus\MarketingProgramm\Parameter\RegionParameter;
use LuzernTourismus\MarketingProgramm\Reader\Region\RegionDataReader;
use LuzernTourismus\MarketingProgramm\Site\Admin\Partner\PartnerActiveSite;
use LuzernTourismus\MarketingProgramm\Site\Admin\Partner\PartnerBestaetigungPdfSite;
use LuzernTourismus\MarketingProgramm\Site\Admin\Partner\PartnerDeleteSite;
use LuzernTourismus\MarketingProgramm\Site\Admin\Partner\PartnerEditSite;
use LuzernTourismus\MarketingProgramm\Site\Admin\Partner\PartnerItemSite;
use LuzernTourismus\MarketingProgramm\Site\Admin\Region\RegionAdminSite;
use LuzernTourismus\MarketingProgramm\Site\Admin\Region\RegionDeleteSite;
use LuzernTourismus\MarketingProgramm\Site\Admin\Region\RegionEditSite;
use LuzernTourismus\MarketingProgramm\Site\Admin\Region\RegionNewSite;
use Nemundo\Admin\Com\Button\AdminIconSiteButton;
use Nemundo\Admin\Com\Layout\AdminFlexboxLayout;
use Nemundo\Admin\Com\Table\AdminTable;
use Nemundo\Admin\Com\Table\AdminTableHeader;
use Nemundo\Admin\Com\Table\Row\AdminTableRow;
use Nemundo\Admin\Com\Title\AdminTitle;
use Nemundo\Com\Template\AbstractTemplateDocument;

class RegionAdminPage extends AbstractTemplateDocument
{
    public function getContent()
    {

        $layout = new AdminFlexboxLayout($this);

        $title = new AdminTitle($layout);
        $title->content = RegionAdminSite::$site->title;  // 'Partner';


        $btn = new AdminIconSiteButton($layout);
        $btn->site = RegionNewSite::$site;
        $btn->showTitle = false;

        $table = new AdminTable($layout);

        $reader = new RegionDataReader();


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