<?php

namespace LuzernTourismus\MarketingProgramm\Page;

use LuzernTourismus\MarketingProgramm\Data\Aktivitaet\AktivitaetReader;
use LuzernTourismus\MarketingProgramm\Data\Anmeldung\AnmeldungCount;
use LuzernTourismus\MarketingProgramm\Lookup\PartnerLookup;
use LuzernTourismus\MarketingProgramm\Parameter\AktivitaetParameter;
use LuzernTourismus\MarketingProgramm\Site\AnmeldungSaveSite;
use LuzernTourismus\MarketingProgramm\Type\Thema\AbstractThema;
use Nemundo\Admin\Com\Button\AdminSiteButton;
use Nemundo\Admin\Com\Layout\AdminFlexboxLayout;
use Nemundo\Admin\Com\Table\AdminLabelValueTable;
use Nemundo\Admin\Com\Title\AdminSubtitle;
use Nemundo\Admin\Com\Title\AdminTitle;
use Nemundo\Com\Html\Hyperlink\EmailHyperlink;
use Nemundo\Com\Html\Hyperlink\PhoneHyperlink;
use Nemundo\Com\Template\AbstractTemplateDocument;
use Nemundo\Html\Paragraph\Paragraph;

class AktivitaetPage extends AbstractTemplateDocument
{

    /**
     * @var AbstractThema
     */
    public $thema;

    public function getContent()
    {

        $layout = new AdminFlexboxLayout($this);

        $title = new AdminTitle($layout);
        $title->content = $this->thema->thema;  // 'Aktivitäten';

        $partnerId = (new PartnerLookup())->getPartnerId();

        $reader = new AktivitaetReader();
        $reader->model->loadKategorie()->loadKontakt();
        $reader->filter->andEqual($reader->model->isDeleted, false);
        $reader->filter->andEqual($reader->model->kategorie->themaId, $this->thema->id);
        foreach ($reader->getData() as $aktivitaetRow) {

            $subtitle = new AdminSubtitle($layout);
            $subtitle->content = $aktivitaetRow->aktivitaet;

            $table = new AdminLabelValueTable($layout);
            $table
                ->addLabelValue($aktivitaetRow->model->aktivitaet->label, $aktivitaetRow->aktivitaet)
                ->addLabelValue($aktivitaetRow->model->kategorie->label, $aktivitaetRow->kategorie->kategorie)
                ->addLabelValue($aktivitaetRow->model->datum->label, $aktivitaetRow->datum)
                ->addLabelValue($aktivitaetRow->model->kosten->label, $aktivitaetRow->kosten)
                ->addLabelValue($aktivitaetRow->model->leistung->label, $aktivitaetRow->leistung)
                ->addLabelValue($aktivitaetRow->model->zielpublikum->label, $aktivitaetRow->zielpublikum)
                ->addLabelValue($aktivitaetRow->model->kontakt->label, $aktivitaetRow->kontakt->vorname . ' ' . $aktivitaetRow->kontakt->name);

            $phone = new PhoneHyperlink();
            $phone->phone = $aktivitaetRow->kontakt->telefon;
            $table->addLabelCom($aktivitaetRow->model->kontakt->telefon->label, $phone);

            $email = new EmailHyperlink();
            $email->email = $aktivitaetRow->kontakt->email;
            $table->addLabelCom($aktivitaetRow->model->kontakt->email->label, $email);


            $count = new AnmeldungCount();
            //$count->filter->andEqual($reader->model->isDeleted, false);
            $count->filter->andEqual($count->model->aktivitaetId, $aktivitaetRow->id);
            $count->filter->andEqual($count->model->partnerId, $partnerId);
            if ($count->getCount() === 0) {

                $site = clone(AnmeldungSaveSite::$site);
                $site->addParameter(new AktivitaetParameter($aktivitaetRow->id));

                $btn = new AdminSiteButton($layout);
                $btn->site = $site;

            } else {

                $p = new Paragraph($layout);
                $p->content = 'Du bist angemeldet';

            }


        }


        return parent::getContent();
    }
}