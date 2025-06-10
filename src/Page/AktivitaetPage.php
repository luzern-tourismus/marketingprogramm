<?php

namespace LuzernTourismus\MarketingProgramm\Page;

use LuzernTourismus\MarketingProgramm\Com\ListBox\KategorieListBox;
use LuzernTourismus\MarketingProgramm\Data\Aktivitaet\AktivitaetReader;
use LuzernTourismus\MarketingProgramm\Data\Anmeldung\AnmeldungCount;
use LuzernTourismus\MarketingProgramm\Data\Anmeldung\AnmeldungId;
use LuzernTourismus\MarketingProgramm\Data\Option\OptionReader;
use LuzernTourismus\MarketingProgramm\Lookup\PartnerLookup;
use LuzernTourismus\MarketingProgramm\Parameter\AnmeldungParameter;
use LuzernTourismus\MarketingProgramm\Parameter\OptionParameter;
use LuzernTourismus\MarketingProgramm\Site\AnmeldungDeleteSite;
use LuzernTourismus\MarketingProgramm\Site\AnmeldungSaveSite;
use LuzernTourismus\MarketingProgramm\Type\Thema\AbstractThema;
use LuzernTourismus\MarketingProgramm\Usergroup\PartnerUsergroup;
use Nemundo\Admin\Com\Form\AdminSearchForm;
use Nemundo\Admin\Com\Hr\AdminHr;
use Nemundo\Admin\Com\Layout\AdminFlexboxLayout;
use Nemundo\Admin\Com\Table\AdminLabelValueTable;
use Nemundo\Admin\Com\Table\AdminTable;
use Nemundo\Admin\Com\Table\AdminTableHeader;
use Nemundo\Admin\Com\Table\Row\AdminTableRow;
use Nemundo\Admin\Com\Title\AdminSubtitle;
use Nemundo\Admin\Com\Title\AdminTitle;
use Nemundo\Admin\Com\Widget\AdminWidget;
use Nemundo\Com\Html\Hyperlink\EmailHyperlink;
use Nemundo\Com\Html\Hyperlink\PhoneHyperlink;
use Nemundo\Com\Template\AbstractTemplateDocument;
use Nemundo\Core\Type\Number\Number;
use Nemundo\User\Usergroup\UsergroupMembership;

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
        $title->content = $this->thema->thema;

        $partnerId = (new PartnerLookup())->getPartnerId();

        $search = new AdminSearchForm($layout);

        $kategorie = new KategorieListBox($search);
        $kategorie->searchMode = true;
        $kategorie->submitOnChange = true;
        $kategorie->themaId = $this->thema->id;


        $reader = new AktivitaetReader();
        $reader->model->loadKategorie()->loadKontakt();
        $reader->filter->andEqual($reader->model->isDeleted, false);
        $reader->filter->andEqual($reader->model->kategorie->themaId, $this->thema->id);

        if ($kategorie->hasValue()) {
            $reader->filter->andEqual($reader->model->kategorieId, $kategorie->getValue());
        }

        foreach ($reader->getData() as $aktivitaetRow) {

            $widget = new AdminWidget($layout);
            $widget->widgetTitle = $aktivitaetRow->aktivitaet;


            $table = new AdminLabelValueTable($widget);
            $table
                ->addLabelValue($aktivitaetRow->model->aktivitaet->label, $aktivitaetRow->aktivitaet)
                ->addLabelValue($aktivitaetRow->model->kategorie->label, $aktivitaetRow->kategorie->kategorie)
                ->addLabelValue($aktivitaetRow->model->datum->label, $aktivitaetRow->datum)
                ->addLabelValue($aktivitaetRow->model->kosten->label, $aktivitaetRow->kosten)
                ->addLabelValue($aktivitaetRow->model->leistung->label, $aktivitaetRow->leistung)
                ->addLabelValue($aktivitaetRow->model->zielpublikum->label, $aktivitaetRow->zielpublikum)
                ->addLabelValue($aktivitaetRow->model->kontakt->label, $aktivitaetRow->kontakt->getVornameNachname());

            $phone = new PhoneHyperlink();
            $phone->phone = $aktivitaetRow->kontakt->telefon;
            $table->addLabelCom($aktivitaetRow->model->kontakt->telefon->label, $phone);

            $email = new EmailHyperlink();
            $email->email = $aktivitaetRow->kontakt->email;
            $table->addLabelCom($aktivitaetRow->model->kontakt->email->label, $email);


            //$subtitle = new AdminSubtitle($layout);
            //$subtitle->content = 'Optionen';

            $reader = new OptionReader();

            $table = new AdminTable($widget);


            (new AdminTableHeader($table))
                ->addText($reader->model->option->label)
                ->addText($reader->model->preis->label)
                ->addEmpty();


            $reader->filter->andEqual($reader->model->aktivitaetId, $aktivitaetRow->id);
            $reader->filter->andEqual($reader->model->isDeleted, false);

            foreach ($reader->getData() as $optionRow) {

                $row = new AdminTableRow($table);
                $row->addText($optionRow->option);
                $row->addText($optionRow->getPreis());

                if ((new UsergroupMembership())->isMemberOfUsergroup(new PartnerUsergroup())) {

                    $count = new AnmeldungCount();
                    $count->filter->andEqual($count->model->isDeleted, false);
                    $count->filter->andEqual($count->model->optionId, $optionRow->id);
                    $count->filter->andEqual($count->model->partnerId, $partnerId);
                    if ($count->getCount() === 0) {

/*                        $site = clone(AnmeldungSaveSite::$site);
                        $site->addParameter(new AktivitaetParameter($aktivitaetRow->id));

                        $btn = new AdminSiteButton($layout);
                        $btn->site = $site;*/

                        $site = clone(AnmeldungSaveSite::$site);
                        $site->addParameter(new OptionParameter($optionRow->id));
                        $row->addSite($site);

                    } else {

                        $row->addText('Du bist angemeldet');

                        $id = new AnmeldungId();
                        $id->filter->andEqual($id->model->isDeleted, false);
                        $id->filter->andEqual($id->model->optionId, $optionRow->id);
                        $id->filter->andEqual($id->model->partnerId, $partnerId);
                        $anmeldungId = $id->getId();

                        $site = clone(AnmeldungDeleteSite::$site);
                        $site->addParameter(new AnmeldungParameter($anmeldungId));
                        $row->addIconSite($site);

                    }

                } else {

                    $row->addText('kein Partner Login');


                }

            }

        }


        return parent::getContent();
    }
}