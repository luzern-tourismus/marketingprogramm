<?php

namespace LuzernTourismus\MarketingProgramm\Business\Aktivitaet;

use LuzernTourismus\MarketingProgramm\ChangeLog\Com\AbstractLogView;
use LuzernTourismus\MarketingProgramm\Data\AktivitaetChangeLog\AktivitaetChangeLogReader;
use Nemundo\Admin\Com\Html\AdminUnorderedList;
use Nemundo\Admin\Com\Table\AdminTableHeader;
use Nemundo\Admin\Com\Table\Row\AdminTableRow;

class AktivitaetLogView extends AbstractLogView
{

    public function getContent()
    {

        $reader = new AktivitaetChangeLogReader();
        //$reader->model->loadUser();
        $reader->filter->andEqual($reader->model->logId, $this->logId);

        /*(new AdminTableHeader($table))
            ->addText($reader->model->user->label)
            ->addText($reader->model->dateTime->label)
            ->addText('Change Log');*/



        foreach ($reader->getData() as $aktivitaetChangeLogRow) {

            /*$row = new AdminTableRow($table);
            $row->addText($aktivitaetChangeLogRow->dateTime->getShortDateTimeLeadingZeroFormat());
            $row->addText($aktivitaetChangeLogRow->user->login);*/

            $ul = new AdminUnorderedList($this);

            if ($aktivitaetChangeLogRow->aktivitaetHasChanged) {
                $ul->addText($aktivitaetChangeLogRow->aktivitaetOld.' => '.$aktivitaetChangeLogRow->aktivitaetNew);
            }

            if ($aktivitaetChangeLogRow->datumHasChanged) {
                $ul->addText($aktivitaetChangeLogRow->datumOld.' => '.$aktivitaetChangeLogRow->datumNew);
            }




        }




        return parent::getContent();

    }


}