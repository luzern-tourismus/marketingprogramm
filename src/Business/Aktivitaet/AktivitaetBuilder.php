<?php

namespace LuzernTourismus\MarketingProgramm\Business\Aktivitaet;

use LuzernTourismus\MarketingProgramm\Business\Base\AbstractBuilder;
use LuzernTourismus\MarketingProgramm\Data\Aktivitaet\Aktivitaet;
use LuzernTourismus\MarketingProgramm\Data\Aktivitaet\AktivitaetReader;
use LuzernTourismus\MarketingProgramm\Data\Aktivitaet\AktivitaetUpdate;
use LuzernTourismus\MarketingProgramm\Data\AktivitaetChangeLog\AktivitaetChangeLog;

use LuzernTourismus\MarketingProgramm\Data\Option\Option;
use LuzernTourismus\MarketingProgramm\Reader\Aktivitaet\AktivitaetDataRow;
use Nemundo\Core\Check\ValueCheck;
use Nemundo\Core\Type\DateTime\DateTime;
use Nemundo\Core\Validation\NumberValidation;
use Nemundo\User\Session\UserSession;

class AktivitaetBuilder extends AbstractBuilder
{

    public $kategorieId;

    public $aktivaet;

    public $datum;

    public $kosten;

    public $leistung;

    public $zielpublikum;

    public $kontaktId;


    protected function loadBuilder()
    {
        $this->type = new AktivitaetType();
    }



    protected function onCreate()
    {

        $data = new Aktivitaet();
        $data->isDeleted = false;
        //$data->kategorieId = $this->kategorieId;
        $data->aktivitaet = $this->aktivaet;
        $data->datum = $this->datum;
        $data->kosten = $this->kosten;
        $data->leistung = $this->leistung;
        $data->zielpublikum = $this->zielpublikum;

        if ((new ValueCheck())->hasValue($this->kategorieId)) {
            $data->kategorieId = $this->kategorieId;
        }

        if ((new ValueCheck())->hasValue($this->kontaktId)) {
            $data->kontaktId = $this->kontaktId;
        }

        $this->id = $data->save();

        //$this->saveChangeLog();

        $aktivitaetNewRow = (new AktivitaetReader())->getRowById($this->id);

        $data = new AktivitaetChangeLog();
        $data->logId = $this->logId;
        $data->aktivitaetId = $this->id;
        $data->aktivitaetHasChanged = true;
        $data->aktivitaetNew = $aktivitaetNewRow->aktivitaet;
        $data->datumHasChanged = true;
        $data->datumNew = $aktivitaetNewRow->datum;
        //$data->dateTime = (new DateTime())->setNow();
        //$data->userId = (new UserSession())->userId;
        $data->save();


    }


    protected function onUpdate()
    {

        $aktivitaetOldRow = (new AktivitaetReader())->getRowById($this->id);


        $update = new AktivitaetUpdate();
        //$update->isDeleted = false;
        //$update->kategorieId = $this->kategorieId;
        $update->aktivitaet = $this->aktivaet;
        $update->datum = $this->datum;
        $update->kosten = $this->kosten;
        $update->leistung = $this->leistung;
        $update->zielpublikum = $this->zielpublikum;
        //$update->kontaktId = $this->kontaktId;

        if ((new ValueCheck())->hasValue($this->kategorieId)) {
            $update->kategorieId = $this->kategorieId;
        }

        if ((new ValueCheck())->hasValue($this->kontaktId)) {
            $update->kontaktId = $this->kontaktId;
        }

        $update->updateById($this->id);

        $this->saveChangeLog2($aktivitaetOldRow);


    }


    private function saveChangeLog2(AktivitaetDataRow $aktivitaetOldRow = null)
    {

        $aktivitaetNewRow = (new AktivitaetReader())->getRowById($this->id);

        $data = new AktivitaetChangeLog();
        $data->aktivitaetId = $this->id;
        $data->logId = $this->logId;

        if ($aktivitaetOldRow->aktivitaet !== $aktivitaetNewRow->aktivitaet) {
            $data->aktivitaetHasChanged = true;
            $data->aktivitaetOld = $aktivitaetOldRow->aktivitaet;
            $data->aktivitaetNew = $aktivitaetNewRow->aktivitaet;
        } else {
            $data->aktivitaetHasChanged = false;
        }

        if ($aktivitaetOldRow->datum !== $aktivitaetNewRow->datum) {
            $data->datumHasChanged = true;
            $data->datumOld = $aktivitaetOldRow->datum;
            $data->datumNew = $aktivitaetNewRow->datum;
        } else {
            $data->datumHasChanged = false;
        }

        //$data->dateTime = (new DateTime())->setNow();
        //$data->userId = (new UserSession())->userId;

        $data->save();

    }



    protected function onDelete()
    {

        $update = new AktivitaetUpdate();
        $update->isDeleted=true;
        $update->updateById($this->id);


    }



    protected function onUndoDelete()
    {

        $update = new AktivitaetUpdate();
        $update->isDeleted=false;
        $update->updateById($this->id);


    }





    public function addOption($option, $preis)
    {

        $data = new Option();
        $data->isDeleted = false;
        $data->aktivitaetId = $this->id;
        $data->option = $option;

        if ((new NumberValidation())->isNumber($preis)) {
            $data->hasPreis = true;
            $data->preis = $preis;
        } else {
            $data->hasPreis = false;
        }


        $data->save();

        return $this;

    }

    public function deleteOption($id)
    {

    }


}