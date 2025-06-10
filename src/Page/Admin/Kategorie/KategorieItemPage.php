<?php

namespace LuzernTourismus\MarketingProgramm\Page\Admin\Kategorie;

use LuzernTourismus\MarketingProgramm\Com\Form\OptionForm;
use LuzernTourismus\MarketingProgramm\Com\Table\AktivitaetLabelValueTable;
use LuzernTourismus\MarketingProgramm\Com\Table\OptionTable;
use LuzernTourismus\MarketingProgramm\Data\Aktivitaet\AktivitaetReader;
use LuzernTourismus\MarketingProgramm\Data\AktivitaetChangeLog\AktivitaetChangeLogReader;
use LuzernTourismus\MarketingProgramm\Data\KategorieLog\KategorieLogReader;
use LuzernTourismus\MarketingProgramm\Parameter\AktivitaetParameter;
use LuzernTourismus\MarketingProgramm\Parameter\KategorieParameter;
use Nemundo\Admin\Com\Html\AdminUnorderedList;
use Nemundo\Admin\Com\Layout\AdminFlexboxLayout;
use Nemundo\Admin\Com\Table\AdminTable;
use Nemundo\Admin\Com\Table\AdminTableHeader;
use Nemundo\Admin\Com\Table\Row\AdminTableRow;
use Nemundo\Admin\Com\Title\AdminSubtitle;
use Nemundo\Admin\Com\Title\AdminTitle;
use Nemundo\Com\Template\AbstractTemplateDocument;

class KategorieItemPage extends AbstractTemplateDocument
{
    public function getContent()
    {


        $layout = new AdminFlexboxLayout($this);

        $kategorieId = (new KategorieParameter())->getValue();

            $subtitle = new AdminSubtitle($layout);
            $subtitle->content = 'Change Log';

            $table = new AdminTable($layout);

            $reader = new KategorieLogReader();
            $reader->model->loadLog()->loadThemaOld()->loadThemaNew();
            $reader->model->log->loadUser()->loadOperation();
            $reader->filter->andEqual($reader->model->kategorieId, $kategorieId);

            (new AdminTableHeader($table))
                ->addText($reader->model->log->operation->label)
                ->addText($reader->model->log->user->label)
                ->addText($reader->model->log->dateTime->label)
                ->addText('Change Log');



            foreach ($reader->getData() as $kategorieLogRow) {

                $row = new AdminTableRow($table);
                $row->addText($kategorieLogRow->log->operation->operation);
                $row->addText($kategorieLogRow->log->dateTime->getShortDateTimeLeadingZeroFormat());
                $row->addText($kategorieLogRow->log->user->login);

                $ul = new AdminUnorderedList($row);

                if ($kategorieLogRow->kategorieHasChanged) {
                    $ul->addText($kategorieLogRow->kategorieOld.' => '.$kategorieLogRow->kategorieNew);
                }

                if ($kategorieLogRow->themaHasChanged) {
                    $ul->addText($kategorieLogRow->themaOld->thema.' => '.$kategorieLogRow->themaNew->thema);
                }




            }




        return parent::getContent();
    }
}