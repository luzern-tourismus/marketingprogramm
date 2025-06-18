<?php

namespace LuzernTourismus\MarketingProgramm\Page\Admin\Partner;

use LuzernTourismus\MarketingProgramm\Com\ListBox\StatusListBox;
use LuzernTourismus\MarketingProgramm\Data\Partner\PartnerReader;
use LuzernTourismus\MarketingProgramm\Parameter\PartnerParameter;
use LuzernTourismus\MarketingProgramm\Parameter\StatusParameter;
use LuzernTourismus\MarketingProgramm\Reader\Partner\PartnerDataReader;
use LuzernTourismus\MarketingProgramm\Site\Admin\Partner\PartnerActiveSite;
use LuzernTourismus\MarketingProgramm\Site\Admin\Partner\PartnerBestaetigungPdfSite;
use LuzernTourismus\MarketingProgramm\Site\Admin\Partner\PartnerDeleteSite;
use LuzernTourismus\MarketingProgramm\Site\Admin\Partner\PartnerEditSite;
use LuzernTourismus\MarketingProgramm\Site\Admin\Partner\PartnerItemSite;
use LuzernTourismus\MarketingProgramm\Site\Admin\Partner\PartnerNewSite;
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

class PartnerAdminPage extends AbstractTemplateDocument
{
    public function getContent()
    {

        $layout = new AdminFlexboxLayout($this);

        $title = new AdminTitle($layout);
        $title->content = 'Partner';

        $search = new AdminSearchForm($layout);

        $status = new StatusListBox($search);
        $status->searchMode=true;
        $status->submitOnChange=true;


        $btn = new AdminIconSiteButton($layout);
        $btn->site = PartnerNewSite::$site;
        $btn->showTitle = false;

        $table = new AdminTable($layout);

        $reader = new PartnerDataReader();

        $parameter = new StatusParameter();

        if ($parameter->hasValue()) {

            if ($parameter->getValue() == (new ActiveStatus())->id) {
                $reader->filter->andEqual($reader->model->isDeleted,false);
            }

            if ($parameter->getValue() == (new DeletedStatus())->id) {
                $reader->filter->andEqual($reader->model->isDeleted,true);
            }

        } else {

        $reader->filter->andEqual($reader->model->isDeleted,false);
        }


        $reader->orderByFirma();

        (new AdminTableHeader($table))
            ->addText($reader->model->firma->label)
            ->addText($reader->model->strasse->label)
            ->addText($reader->model->plz->label.'/'.$reader->model->ort->label)
            ->addText($reader->model->mitarbeiter->label)
            ->addText($reader->model->anmeldungFinalisiert->label)
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

            $row->addText($partnerRow->strasse);
            $row->addText($partnerRow->getPlzOrt());
            $row->addText($partnerRow->mitarbeiter->getVornameName());

            $row->addYesNo($partnerRow->anmeldungFinalisiert);

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