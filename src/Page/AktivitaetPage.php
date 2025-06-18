<?php

namespace LuzernTourismus\MarketingProgramm\Page;

use LuzernTourismus\MarketingProgramm\Com\ListBox\KategorieListBox;
use LuzernTourismus\MarketingProgramm\Com\ListBox\RegionListBox;
use LuzernTourismus\MarketingProgramm\Data\Anmeldung\AnmeldungCount;
use LuzernTourismus\MarketingProgramm\Data\Anmeldung\AnmeldungId;
use LuzernTourismus\MarketingProgramm\Data\Option\OptionReader;
use LuzernTourismus\MarketingProgramm\Lookup\PartnerLookup;
use LuzernTourismus\MarketingProgramm\Parameter\AktivitaetParameter;
use LuzernTourismus\MarketingProgramm\Parameter\AnmeldungParameter;
use LuzernTourismus\MarketingProgramm\Parameter\OptionParameter;
use LuzernTourismus\MarketingProgramm\Reader\Aktivitaet\AktivitaetDataReader;
use LuzernTourismus\MarketingProgramm\Site\Admin\Aktivitaet\AktivitaetEditSite;
use LuzernTourismus\MarketingProgramm\Site\Admin\Aktivitaet\AktivitaetItemSite;
use LuzernTourismus\MarketingProgramm\Site\AnmeldungDeleteSite;
use LuzernTourismus\MarketingProgramm\Site\AnmeldungSaveSite;
use LuzernTourismus\MarketingProgramm\Type\Thema\AbstractThema;
use LuzernTourismus\MarketingProgramm\Type\Thema\MarktmanagementThema;
use LuzernTourismus\MarketingProgramm\Usergroup\KontaktUsergroup;
use LuzernTourismus\MarketingProgramm\Usergroup\PartnerUsergroup;
use Nemundo\Admin\Com\Button\AdminSiteButton;
use Nemundo\Admin\Com\Form\AdminSearchForm;
use Nemundo\Admin\Com\Layout\AdminFlexboxLayout;
use Nemundo\Admin\Com\Layout\Flex\AdminRowFlexLayout;
use Nemundo\Admin\Com\ListBox\AdminCheckBox;
use Nemundo\Admin\Com\Table\AdminLabelValueTable;
use Nemundo\Admin\Com\Table\AdminTable;
use Nemundo\Admin\Com\Table\AdminTableHeader;
use Nemundo\Admin\Com\Table\Row\AdminTableRow;
use Nemundo\Admin\Com\Title\AdminTitle;
use Nemundo\Admin\Com\Widget\AdminWidget;
use Nemundo\Com\Html\Hyperlink\EmailHyperlink;
use Nemundo\Com\Html\Hyperlink\PhoneHyperlink;
use Nemundo\Com\Template\AbstractTemplateDocument;
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

        if ($this->thema->id === (new MarktmanagementThema())->id) {
            $region = new RegionListBox($search);
            $region->searchMode = true;
            $region->submitOnChange = true;
        }

        $kategorie = new KategorieListBox($search);
        $kategorie->searchMode = true;
        $kategorie->submitOnChange = true;
        $kategorie->themaId = $this->thema->id;



        $reader = new AktivitaetDataReader();


        $reader->filter->andEqual($reader->model->isDeleted, false);


        $reader->filter->andEqual($reader->model->kategorie->themaId, $this->thema->id);

        if ($this->thema->id === (new MarktmanagementThema())->id) {
            if ($region->hasValue()) {
                $reader->filter->andEqual($reader->model->kategorie->regionId, $region->getValue());
            }
        }

        if ($kategorie->hasValue()) {
            $reader->filter->andEqual($reader->model->kategorieId, $kategorie->getValue());
        }

        foreach ($reader->getData() as $aktivitaetRow) {

            $widget = new AdminWidget($layout);
            $widget->widgetTitle = $aktivitaetRow->aktivitaet;

            $widgetLayout = new AdminFlexboxLayout($widget);

            $table = new AdminLabelValueTable($widgetLayout);
            $table
                ->addLabelValue($aktivitaetRow->model->aktivitaet->label, $aktivitaetRow->aktivitaet)
                ->addLabelValue($aktivitaetRow->model->kategorie->label, $aktivitaetRow->kategorie->kategorie)
                ->addLabelValue($aktivitaetRow->model->kategorie->region->label, $aktivitaetRow->kategorie->region->region)
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

            $table = new AdminTable($widgetLayout);

            (new AdminTableHeader($table))
                ->addText($reader->model->option->label)
                ->addText($reader->model->preis->label)
                ->addEmpty(2);


            $reader->filter->andEqual($reader->model->aktivitaetId, $aktivitaetRow->id);
            $reader->filter->andEqual($reader->model->isDeleted, false);
            $reader->addOrder($reader->model->itemOrder);

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


                        if (!(new PartnerLookup())->isAnmeldungFinalisiert()) {
                            $site = clone(AnmeldungSaveSite::$site);
                            $site->addParameter(new OptionParameter($optionRow->id));
                            $row->addSite($site);
                        } else {
                            $row->addEmpty();
                        }


                    } else {

                        $row->addText('Du bist angemeldet.');

                        $id = new AnmeldungId();
                        $id->filter->andEqual($id->model->isDeleted, false);
                        $id->filter->andEqual($id->model->optionId, $optionRow->id);
                        $id->filter->andEqual($id->model->partnerId, $partnerId);
                        $anmeldungId = $id->getId();

                        if (!(new PartnerLookup())->isAnmeldungFinalisiert()) {
                            $site = clone(AnmeldungDeleteSite::$site);
                            $site->addParameter(new AnmeldungParameter($anmeldungId));
                            //$row->addIconSite($site);
                            $row->addSite($site);
                        }

                    }

                } else {

                    $row->addText('kein Partner Login');


                }

            }

            if ((new UsergroupMembership())->isMemberOfUsergroup(new KontaktUsergroup())) {

                $div = new AdminRowFlexLayout($widgetLayout);

                $btn = new AdminSiteButton($div);
                $btn->site = clone(AktivitaetEditSite::$site);
                $btn->site->addParameter(new AktivitaetParameter($aktivitaetRow->id));

                $btn = new AdminSiteButton($div);
                $btn->site = clone(AktivitaetItemSite::$site);
                $btn->site->addParameter(new AktivitaetParameter($aktivitaetRow->id));

            }


        }


        return parent::getContent();
    }
}