<?php

namespace LuzernTourismus\MarketingProgramm\Page\Admin\Aktivitaet;

use LuzernTourismus\MarketingProgramm\Parameter\AktivitaetParameter;
use LuzernTourismus\MarketingProgramm\Parameter\OptionParameter;
use LuzernTourismus\MarketingProgramm\Reader\Aktivitaet\AktivitaetDataReader;
use LuzernTourismus\MarketingProgramm\Reader\Option\OptionDataReader;
use LuzernTourismus\MarketingProgramm\Site\Admin\Aktivitaet\AktivitaetAdminSite;
use LuzernTourismus\MarketingProgramm\Site\Admin\Aktivitaet\OptionActiveSite;
use LuzernTourismus\MarketingProgramm\Site\Admin\Aktivitaet\OptionDeleteSite;
use LuzernTourismus\MarketingProgramm\Site\Admin\Aktivitaet\OptionEditSite;
use LuzernTourismus\MarketingProgramm\Site\Admin\Aktivitaet\OptionNewSite;
use Nemundo\Admin\Com\Button\AdminIconSiteButton;
use Nemundo\Admin\Com\Button\AdminSiteButton;
use Nemundo\Admin\Com\Layout\AdminFlexboxLayout;
use Nemundo\Admin\Com\Table\AdminLabelValueTable;
use Nemundo\Admin\Com\Table\AdminTable;
use Nemundo\Admin\Com\Table\AdminTableHeader;
use Nemundo\Admin\Com\Table\Row\AdminTableRow;
use Nemundo\Admin\Com\Title\AdminTitle;
use Nemundo\Com\Template\AbstractTemplateDocument;

class AktivitaetItemPage extends AbstractTemplateDocument
{
    public function getContent()
    {

        $layout = new AdminFlexboxLayout($this);

        $btn = new AdminSiteButton($layout);
        $btn->site = AktivitaetAdminSite::$site;
        $btn->site->title = 'Zurück';

        $aktivitaetId = (new AktivitaetParameter())->getValue();

        $reader = new AktivitaetDataReader();
        $reader->filter->andEqual($reader->model->id, $aktivitaetId);
        $aktivitaetRow = $reader->getRow();

        $title = new AdminTitle($layout);
        $title->content = $aktivitaetRow->aktivitaet;


        $table = new AdminLabelValueTable($layout);
        $table
            ->addLabelValue($aktivitaetRow->model->aktivitaet->label, $aktivitaetRow->aktivitaet)
            ->addLabelValue($aktivitaetRow->model->kategorie->label, $aktivitaetRow->kategorie->kategorie)
            ->addLabelValue($aktivitaetRow->model->kategorie->region->label, $aktivitaetRow->kategorie->region->region)
            ->addLabelValue($aktivitaetRow->model->datum->label, $aktivitaetRow->datum)
            ->addLabelValue($aktivitaetRow->model->kosten->label, $aktivitaetRow->kosten)
            ->addLabelValue($aktivitaetRow->model->leistung->label, $aktivitaetRow->leistung)
            ->addLabelValue($aktivitaetRow->model->zielpublikum->label, $aktivitaetRow->zielpublikum)
            ->addLabelValue($aktivitaetRow->model->kontakt->label, $aktivitaetRow->kontakt->getVornameNachname());


        $site = clone(OptionNewSite::$site);
        $site->addParameter(new AktivitaetParameter($aktivitaetId));

        $btn = new AdminIconSiteButton($layout);
        $btn->showTitle = false;
        $btn->site = $site;


        $table = new AdminTable($layout);

        $reader = new OptionDataReader();

        (new AdminTableHeader($table))
            ->addText($reader->model->option->label)
            ->addText($reader->model->preis->label)
            ->addText($reader->model->itemOrder->label)
            ->addEmpty(2);

        $reader->filter->andEqual($reader->model->aktivitaetId, $aktivitaetId);
        $reader->filter->andEqual($reader->model->isDeleted, false);
        $reader->addOrder($reader->model->option);
        foreach ($reader->getData() as $optionRow) {

            $row = new AdminTableRow($table);
            $row->strikeThrough = $optionRow->isDeleted;
            $row->addText($optionRow->option);
            $row->addText($optionRow->getPreis());
            $row->addText($optionRow->itemOrder);

            $site = clone(OptionEditSite::$site);
            $site->addParameter(new OptionParameter($optionRow->id));
            $row->addIconSite($site);

            if ($optionRow->isDeleted) {

                $site = clone(OptionActiveSite::$site);
                $site->addParameter(new OptionParameter($optionRow->id));
                $row->addIconSite($site);

            } else {

                $site = clone(OptionDeleteSite::$site);
                $site->addParameter(new OptionParameter($optionRow->id));
                $row->addIconSite($site);
            }

        }

        return parent::getContent();
    }
}