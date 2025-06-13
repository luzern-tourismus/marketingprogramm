<?php

namespace LuzernTourismus\MarketingProgramm\Business\Kategorie;

use LuzernTourismus\MarketingProgramm\ChangeLog\Com\AbstractLogView;
use LuzernTourismus\MarketingProgramm\Data\KategorieLog\KategorieLogReader;
use Nemundo\Admin\Com\Html\AdminUnorderedList;

class KategorieLogView extends AbstractLogView
{

    public function getContent()
    {

        $reader = new KategorieLogReader();
        $reader->model->loadThemaOld()->loadThemaNew();

        $reader->filter->andEqual($reader->model->logId, $this->logId);

        foreach ($reader->getData() as $kategorieLogRow) {

            $ul = new AdminUnorderedList($this);

            if ($kategorieLogRow->kategorieHasChanged) {
                $ul->addText($kategorieLogRow->kategorieOld . ' => ' . $kategorieLogRow->kategorieNew);
            }

            if ($kategorieLogRow->regionHasChanged) {
                $ul->addText($kategorieLogRow->regionOld->region . ' => ' . $kategorieLogRow->regionNew->region);
            }

            if ($kategorieLogRow->themaHasChanged) {
                $ul->addText($kategorieLogRow->themaOld->thema . ' => ' . $kategorieLogRow->themaNew->thema);
            }

        }

        return parent::getContent();

    }

}