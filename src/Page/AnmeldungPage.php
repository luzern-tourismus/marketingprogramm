<?php

namespace LuzernTourismus\MarketingProgramm\Page;

use LuzernTourismus\MarketingProgramm\Data\Anmeldung\AnmeldungReader;
use LuzernTourismus\MarketingProgramm\Lookup\PartnerLookup;
use Nemundo\Admin\Com\Layout\AdminFlexboxLayout;
use Nemundo\Admin\Com\Table\AdminTable;
use Nemundo\Admin\Com\Table\AdminTableHeader;
use Nemundo\Admin\Com\Table\Row\AdminTableRow;
use Nemundo\Admin\Com\Title\AdminTitle;
use Nemundo\Com\Template\AbstractTemplateDocument;

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
            $anmeldungReader->model->loadAktivitaet();
            $anmeldungReader->filter->andEqual($anmeldungReader->model->partnerId, $partnerRow->id);

            (new AdminTableHeader($table))
                ->addText($anmeldungReader->model->aktivitaet->label);

            foreach ($anmeldungReader->getData() as $anmeldungRow) {

                (new AdminTableRow($table))
                    ->addText($anmeldungRow->aktivitaet->aktivitaet);


            }

            //}

        }


        return parent::getContent();
    }
}