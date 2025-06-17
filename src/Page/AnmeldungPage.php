<?php

namespace LuzernTourismus\MarketingProgramm\Page;

use LuzernTourismus\MarketingProgramm\Data\Anmeldung\AnmeldungReader;
use LuzernTourismus\MarketingProgramm\Lookup\PartnerLookup;
use LuzernTourismus\MarketingProgramm\Parameter\AnmeldungParameter;
use LuzernTourismus\MarketingProgramm\Price\PriceNumber;
use LuzernTourismus\MarketingProgramm\Site\AnmeldungDeleteSite;
use LuzernTourismus\MarketingProgramm\Site\AnmeldungFinalisierenSite;
use Nemundo\Admin\Com\Button\AdminSiteButton;
use Nemundo\Admin\Com\Layout\AdminFlexboxLayout;
use Nemundo\Admin\Com\Table\AdminTable;
use Nemundo\Admin\Com\Table\AdminTableHeader;
use Nemundo\Admin\Com\Table\Row\AdminTableRow;
use Nemundo\Admin\Com\Title\AdminTitle;
use Nemundo\Com\Template\AbstractTemplateDocument;
use Nemundo\Html\Formatting\Bold;
use Nemundo\Html\Paragraph\Paragraph;

class AnmeldungPage extends AbstractTemplateDocument
{
    public function getContent()
    {

        $layout = new AdminFlexboxLayout($this);

        $partnerRow = (new PartnerLookup())->getPartnerRow();

        if ($partnerRow != null) {

            /*$partnerMitarbeiterReader = new PartnerMitarbeiterReader();
            $partnerMitarbeiterReader->model->loadPartner();
            $partnerMitarbeiterReader->filter->andEqual($partnerMitarbeiterReader->model->email, (new UserSession())->login);

            foreach ($partnerMitarbeiterReader->getData() as $partnerMitarbeiterRow) {*/

            $title = new AdminTitle($layout);
            $title->content = 'Anmeldungen für Partner: ' . $partnerRow->firma;  // $partnerMitarbeiterRow->partner->firma;

            $table = new AdminTable($layout);

            $anmeldungReader = new AnmeldungReader();
            $anmeldungReader->model->loadOption();
            $anmeldungReader->model->option->loadAktivitaet();
            $anmeldungReader->filter->andEqual($anmeldungReader->model->partnerId, $partnerRow->id);
            $anmeldungReader->filter->andEqual($anmeldungReader->model->isDeleted, false);

            (new AdminTableHeader($table))
                ->addText($anmeldungReader->model->option->aktivitaet->label)
                ->addText($anmeldungReader->model->option->label)
                ->addText($anmeldungReader->model->option->preis->label)
                ->addEmpty();

            $total = 0;

            foreach ($anmeldungReader->getData() as $anmeldungRow) {

                $row = new AdminTableRow($table);
                $row->strikeThrough = $anmeldungRow->isDeleted;

                $row->addText($anmeldungRow->option->aktivitaet->aktivitaet)
                    ->addText($anmeldungRow->option->option)
                    ->addText($anmeldungRow->option->getPreis());

                if ($anmeldungRow->option->hasPreis) {
                    $row->addText($anmeldungRow->option->preis);
                    if (!$anmeldungRow->isDeleted) {
                        $total += $anmeldungRow->option->preis;
                    }
                } /*else {
                    $row->addText('tbd');
                }*/


                if (!$partnerRow->anmeldungFinalisiert) {

                $site = clone(AnmeldungDeleteSite::$site);
                $site->addParameter(new AnmeldungParameter($anmeldungRow->id));
                $row->addIconSite($site);
                }

            }

            $row = new AdminTableRow($table);

            $bold = new Bold();
            $bold->content = 'Total';
            $row->addText($bold->getBodyContent());

            $row->addEmpty();

            $bold = new Bold();
            $bold->content = (new PriceNumber())->getPrice( $total);  //.' CHF';
            $row->addText($bold->getBodyContent());


            if (!$partnerRow->anmeldungFinalisiert) {
                $btn = new AdminSiteButton($layout);
                $btn->site = AnmeldungFinalisierenSite::$site;
            } else {

                $p = new Paragraph($layout);
                $p->content = 'Anmeldung wurde finalisiert';


            }
        }







        return parent::getContent();
    }
}