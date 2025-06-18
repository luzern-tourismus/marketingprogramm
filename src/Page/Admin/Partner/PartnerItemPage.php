<?php

namespace LuzernTourismus\MarketingProgramm\Page\Admin\Partner;

use LuzernTourismus\MarketingProgramm\Com\Form\PartnerMitarbeiterForm;
use LuzernTourismus\MarketingProgramm\Data\Partner\Partner;
use LuzernTourismus\MarketingProgramm\Data\Partner\PartnerReader;
use LuzernTourismus\MarketingProgramm\Data\PartnerMitarbeiter\PartnerMitarbeiterReader;
use LuzernTourismus\MarketingProgramm\Parameter\PartnerParameter;
use LuzernTourismus\MarketingProgramm\Reader\PartnerMitarbeiter\PartnerMitarbeiterDataReader;
use LuzernTourismus\MarketingProgramm\Site\Admin\Partner\PartnerAdminSite;
use LuzernTourismus\MarketingProgramm\Site\Admin\Partner\PartnerItemSite;
use Nemundo\Admin\Com\Button\AdminSiteButton;
use Nemundo\Admin\Com\Layout\AdminFlexboxLayout;
use Nemundo\Admin\Com\Table\AdminTable;
use Nemundo\Admin\Com\Table\AdminTableHeader;
use Nemundo\Admin\Com\Table\Row\AdminTableRow;
use Nemundo\Admin\Com\Title\AdminTitle;
use Nemundo\Com\Template\AbstractTemplateDocument;

class PartnerItemPage extends AbstractTemplateDocument
{
    public function getContent()
    {

        $partnerId = (new PartnerParameter())->getValue();

        $layout = new AdminFlexboxLayout($this);

        $btn = new AdminSiteButton($layout);
        $btn->site = PartnerAdminSite::$site;
        $btn->site->title = 'Zurück';

        $reader = new PartnerReader();
        $reader->filter->andEqual($reader->model->id, $partnerId);
        foreach ($reader->getData() as $partnerRow) {

            $title = new AdminTitle($layout);
            $title->content= $partnerRow->firma;

            $form = new PartnerMitarbeiterForm($layout);
            $form->partnerId= $partnerRow->id;


            $table = new AdminTable($layout);

            $mitarbeiterReader = new PartnerMitarbeiterDataReader();
            $mitarbeiterReader->filterByPartnerId($partnerRow->id);
            //$mitarbeiterReader->filter->andEqual($mitarbeiterReader->model->partnerId, $partnerRow->id);

            (new AdminTableHeader($table))
                ->addText($mitarbeiterReader->model->anrede->label)
                ->addText($mitarbeiterReader->model->name->label)
                ->addText($mitarbeiterReader->model->vorname->label)
                ->addText($mitarbeiterReader->model->email->label);


            foreach ($mitarbeiterReader->getData() as $mitarbeiterRow) {

                (new AdminTableRow($table))
                    ->addText($mitarbeiterRow->anrede->anrede)
                    ->addText($mitarbeiterRow->name)
                    ->addText($mitarbeiterRow->vorname)
                    ->addText($mitarbeiterRow->email);

            }

        }

        return parent::getContent();
    }
}