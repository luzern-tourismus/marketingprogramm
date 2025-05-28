<?php

namespace LuzernTourismus\MarketingProgramm\Page\Admin\Aktivitaet;

use LuzernTourismus\MarketingProgramm\Com\Table\AktivitaetLabelValueTable;
use LuzernTourismus\MarketingProgramm\Data\Aktivitaet\AktivitaetReader;
use LuzernTourismus\MarketingProgramm\Data\AktivitaetChangeLog\AktivitaetChangeLogReader;
use LuzernTourismus\MarketingProgramm\Parameter\AktivitaetParameter;
use Nemundo\Admin\Com\Layout\AdminFlexboxLayout;
use Nemundo\Admin\Com\Table\AdminTable;
use Nemundo\Admin\Com\Table\Row\AdminTableRow;
use Nemundo\Admin\Com\Title\AdminSubtitle;
use Nemundo\Admin\Com\Title\AdminTitle;
use Nemundo\Com\Template\AbstractTemplateDocument;

class AktivitaetItemPage extends AbstractTemplateDocument
{
    public function getContent()
    {

        $layout = new AdminFlexboxLayout($this);

        $aktivitaetId = (new AktivitaetParameter())->getValue();

        $reader = new AktivitaetReader();
        $reader->model->loadKategorie()->loadKontakt();
        $reader->filter->andEqual($reader->model->id,$aktivitaetId);
        foreach ($reader->getData() as $aktivitaetRow) {

            $title = new AdminTitle($layout);
            $title->content = $aktivitaetRow->aktivitaet;

            $table = new AktivitaetLabelValueTable($layout);
            $table->aktivitaetRow= $aktivitaetRow;



            $subtitle = new AdminSubtitle($layout);
            $subtitle->content = 'Change Log';

            $table = new AdminTable($layout);

            $reader = new AktivitaetChangeLogReader();
            $reader->filter->andEqual($reader->model->aktivitaetId,$aktivitaetId);
            foreach ($reader->getData() as $aktivitaetChangeLogRow) {

                $row = new AdminTableRow($table);
                $row->addText($aktivitaetChangeLogRow->dateTime->getShortDateTimeLeadingZeroFormat());



            }





        }


        return parent::getContent();
    }
}