<?php

namespace LuzernTourismus\MarketingProgramm\Business\Kontakt;

use LuzernTourismus\MarketingProgramm\ChangeLog\Com\AbstractLogView;
use LuzernTourismus\MarketingProgramm\Data\nachnameLog\nachnameLogReader;
use LuzernTourismus\MarketingProgramm\Data\KontaktLog\KontaktLogReader;
use Nemundo\Admin\Com\Html\AdminUnorderedList;

class KontaktLogView extends AbstractLogView
{

    public function getContent()
    {


        $reader = new KontaktLogReader();
        //$reader->model->loadThemaOld()->loadThemaNew();

        $reader->filter->andEqual($reader->model->logId, $this->logId);

        foreach ($reader->getData() as $kontaktLogRow) {

            $ul = new AdminUnorderedList($this);

            if ($kontaktLogRow->nachnameHasChanged) {
                $ul->addText($kontaktLogRow->nachnameOld . ' => ' . $kontaktLogRow->nachnameNew);
            }

            if ($kontaktLogRow->vornameHasChanged) {
                $ul->addText($kontaktLogRow->vornameOld . ' => ' . $kontaktLogRow->vornameNew);
            }

            if ($kontaktLogRow->telefonHasChanged) {
                $ul->addText($kontaktLogRow->telefonOld . ' => ' . $kontaktLogRow->telefonNew);
            }
            
            if ($kontaktLogRow->emailHasChanged) {
                $ul->addText($kontaktLogRow->emailOld . ' => ' . $kontaktLogRow->emailNew);
            }

            
            
            
        }
        

        return parent::getContent();

    }

}