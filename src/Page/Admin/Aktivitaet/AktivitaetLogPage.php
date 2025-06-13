<?php

namespace LuzernTourismus\MarketingProgramm\Page\Admin\Aktivitaet;

use LuzernTourismus\MarketingProgramm\Com\Form\OptionForm;
use LuzernTourismus\MarketingProgramm\Com\Table\AktivitaetLabelValueTable;
use LuzernTourismus\MarketingProgramm\Data\AktivitaetChangeLog\AktivitaetChangeLogReader;
use Nemundo\Admin\Com\Html\AdminUnorderedList;
use Nemundo\Admin\Com\Layout\AdminFlexboxLayout;
use Nemundo\Admin\Com\Table\AdminTable;
use Nemundo\Admin\Com\Table\AdminTableHeader;
use Nemundo\Admin\Com\Table\Row\AdminTableRow;
use Nemundo\Admin\Com\Title\AdminSubtitle;
use Nemundo\Com\Template\AbstractTemplateDocument;

class AktivitaetLogPage extends AbstractTemplateDocument
{
    public function getContent()
    {

        $layout = new AdminFlexboxLayout($this);

        //$form = new OptionForm($layout);
        //$form->aktivitaetId = $aktivitaetId;

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
            ->addText($reader->model->log->dateTime->label);


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