<?php

namespace LuzernTourismus\MarketingProgramm\Page\Admin\Partner;

use LuzernTourismus\MarketingProgramm\Data\Partner\PartnerReader;
use LuzernTourismus\MarketingProgramm\Parameter\PartnerParameter;
use LuzernTourismus\MarketingProgramm\Reader\Partner\PartnerDataReader;
use LuzernTourismus\MarketingProgramm\Site\Admin\Partner\PartnerActiveSite;
use LuzernTourismus\MarketingProgramm\Site\Admin\Partner\PartnerBestaetigungPdfSite;
use LuzernTourismus\MarketingProgramm\Site\Admin\Partner\PartnerDeleteSite;
use LuzernTourismus\MarketingProgramm\Site\Admin\Partner\PartnerEditSite;
use LuzernTourismus\MarketingProgramm\Site\Admin\Partner\PartnerItemSite;
use LuzernTourismus\MarketingProgramm\Site\Admin\Partner\PartnerNewSite;
use Nemundo\Admin\Com\Button\AdminIconSiteButton;
use Nemundo\Admin\Com\Layout\AdminFlexboxLayout;
use Nemundo\Admin\Com\Table\AdminTable;
use Nemundo\Admin\Com\Table\AdminTableHeader;
use Nemundo\Admin\Com\Table\Row\AdminTableRow;
use Nemundo\Admin\Com\Title\AdminTitle;
use Nemundo\Com\Template\AbstractTemplateDocument;

class PartnerAdminPage extends AbstractTemplateDocument
{
    public function getContent()
    {


        $layout = new AdminFlexboxLayout($this);

        $title = new AdminTitle($layout);
        $title->content = 'Partner';


        $btn = new AdminIconSiteButton($layout);
        $btn->site = PartnerNewSite::$site;
        $btn->showTitle = false;

        $table = new AdminTable($layout);

        $reader = new PartnerDataReader();
        $reader->orderByFirma();

        (new AdminTableHeader($table))
            ->addText($reader->model->firma->label)
            ->addEmpty(3);

        foreach ($reader->getData() as $partnerRow) {

            $site = clone(PartnerEditSite::$site);
            $site->addParameter(new PartnerParameter($partnerRow->id));

            $row = new AdminTableRow($table);
            $row->strikeThrough = $partnerRow->isDeleted;

            $site = clone(PartnerItemSite::$site);
            $site->title = $partnerRow->firma;
            $site->addParameter(new PartnerParameter($partnerRow->id));
            $row->addSite($site);

            $site = clone(PartnerBestaetigungPdfSite::$site);
            $site->addParameter(new PartnerParameter($partnerRow->id));
            $row->addIconSite($site);


            /*$row
                ->addText($partnerRow->firma);*/

            if (!$partnerRow->isDeleted) {

                $site = clone(PartnerEditSite::$site);
                $site->addParameter(new PartnerParameter($partnerRow->id));
                $row->addIconSite($site);

                $site = clone(PartnerDeleteSite::$site);
                $site->addParameter(new PartnerParameter($partnerRow->id));
                $row->addIconSite($site);

            } else {

                $site = clone(PartnerActiveSite::$site);
                $site->addParameter(new PartnerParameter($partnerRow->id));
                $row->addIconSite($site);

            }


        }


        return parent::getContent();
    }
}