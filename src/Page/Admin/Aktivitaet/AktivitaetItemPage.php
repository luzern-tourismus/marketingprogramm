<?php

namespace LuzernTourismus\MarketingProgramm\Page\Admin\Aktivitaet;

use LuzernTourismus\MarketingProgramm\Com\Form\OptionForm;
use LuzernTourismus\MarketingProgramm\Com\Table\AktivitaetLabelValueTable;
use LuzernTourismus\MarketingProgramm\Data\Aktivitaet\AktivitaetReader;
use LuzernTourismus\MarketingProgramm\Data\AktivitaetChangeLog\AktivitaetChangeLogReader;
use LuzernTourismus\MarketingProgramm\Data\Option\OptionReader;
use LuzernTourismus\MarketingProgramm\Parameter\AktivitaetParameter;
use LuzernTourismus\MarketingProgramm\Parameter\OptionParameter;
use LuzernTourismus\MarketingProgramm\Site\Admin\Aktivitaet\AktivitaetAdminSite;
use LuzernTourismus\MarketingProgramm\Site\Admin\Aktivitaet\OptionDeleteSite;
use Nemundo\Admin\Com\Button\AdminSiteButton;
use Nemundo\Admin\Com\Html\AdminUnorderedList;
use Nemundo\Admin\Com\Layout\AdminFlexboxLayout;
use Nemundo\Admin\Com\Table\AdminTable;
use Nemundo\Admin\Com\Table\AdminTableHeader;
use Nemundo\Admin\Com\Table\Row\AdminTableRow;
use Nemundo\Admin\Com\Title\AdminSubtitle;
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

        $reader = new AktivitaetReader();
        $reader->model->loadKategorie()->loadKontakt();
        $reader->filter->andEqual($reader->model->id, $aktivitaetId);
        $aktivitaetRow = $reader->getRow();

        $title = new AdminTitle($layout);
        $title->content = $aktivitaetRow->aktivitaet;


        //$table = new OptionTable($layout);
        //$table->aktivitaetId = $aktivitaetId;

        $table = new AdminTable($layout);

        $reader = new OptionReader();

        (new AdminTableHeader($table))
            ->addText($reader->model->option->label)
            ->addText($reader->model->preis->label)
            ->addEmpty();


        $reader->filter->andEqual($reader->model->aktivitaetId, $aktivitaetId);
        $reader->addOrder($reader->model->option);
        foreach ($reader->getData() as $optionRow) {

            $row = new AdminTableRow($table);
            $row->strikeThrough = $optionRow->isDeleted;
            $row->addText($optionRow->option);
            $row->addText($optionRow->getPreis());

            $site = clone(OptionDeleteSite::$site);
            $site->addParameter(new OptionParameter($optionRow->id));
            $row->addIconSite($site);

        }


        $form = new OptionForm($layout);
        $form->aktivitaetId = $aktivitaetId;

        $table = new AktivitaetLabelValueTable($layout);
        $table->aktivitaetRow = $aktivitaetRow;


        $subtitle = new AdminSubtitle($layout);
        $subtitle->content = 'Change Log';

        $table = new AdminTable($layout);

        $reader = new AktivitaetChangeLogReader();
        $reader->model->loadLog();
        $reader->model->log->loadUser();
        $reader->filter->andEqual($reader->model->aktivitaetId, $aktivitaetId);

        (new AdminTableHeader($table))
            ->addText('Change')
            ->addText($reader->model->log->user->label)
            ->addText($reader->model->log->dateTime->label)
       ;


        foreach ($reader->getData() as $aktivitaetChangeLogRow) {

            $row = new AdminTableRow($table);

            $ul = new AdminUnorderedList($row);

            if ($aktivitaetChangeLogRow->aktivitaetHasChanged) {
                $ul->addText($aktivitaetChangeLogRow->aktivitaetOld . ' => ' . $aktivitaetChangeLogRow->aktivitaetNew);
            }

            if ($aktivitaetChangeLogRow->datumHasChanged) {
                $ul->addText($aktivitaetChangeLogRow->datumOld . ' => ' . $aktivitaetChangeLogRow->datumNew);
            }

            $row->addText($aktivitaetChangeLogRow->log->user->login);
            $row->addText($aktivitaetChangeLogRow->log->dateTime->getShortDateTimeLeadingZeroFormat());

        }

        return parent::getContent();
    }
}