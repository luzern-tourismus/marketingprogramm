<?php

namespace LuzernTourismus\MarketingProgramm\Business\Aktivitaet;

use LuzernTourismus\MarketingProgramm\Business\Base\AbstractBuilder;
use LuzernTourismus\MarketingProgramm\Clean\WordClean;
use LuzernTourismus\MarketingProgramm\Data\Aktivitaet\Aktivitaet;
use LuzernTourismus\MarketingProgramm\Data\Aktivitaet\AktivitaetReader;
use LuzernTourismus\MarketingProgramm\Data\Aktivitaet\AktivitaetUpdate;
use LuzernTourismus\MarketingProgramm\Data\AktivitaetChangeLog\AktivitaetChangeLog;
use LuzernTourismus\MarketingProgramm\Data\Option\Option;
use LuzernTourismus\MarketingProgramm\Data\Option\OptionCount;
use LuzernTourismus\MarketingProgramm\Data\Option\OptionReader;
use Nemundo\Core\Check\ValueCheck;
use Nemundo\Core\Validation\NumberValidation;
use Nemundo\Db\Sql\Order\SortOrder;

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

        $this->cleanData();

        $data = new Aktivitaet();
        $data->isDeleted = false;
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

        $aktivitaetNewRow = (new AktivitaetReader())->getRowById($this->id);

        $data = new AktivitaetChangeLog();
        $data->logId = $this->logId;
        $data->aktivitaetId = $this->id;
        $data->aktivitaetHasChanged = true;
        $data->aktivitaetNew = $aktivitaetNewRow->aktivitaet;
        $data->datumHasChanged = true;
        $data->datumNew = $aktivitaetNewRow->datum;
        $data->save();

    }


    protected function onUpdate()
    {

        $this->cleanData();

        $aktivitaetOldRow = (new AktivitaetReader())->getRowById($this->id);

        $update = new AktivitaetUpdate();
        $update->aktivitaet = $this->aktivaet;
        $update->datum = $this->datum;
        $update->kosten = $this->kosten;
        $update->leistung = $this->leistung;
        $update->zielpublikum = $this->zielpublikum;

        if ((new ValueCheck())->hasValue($this->kategorieId)) {
            $update->kategorieId = $this->kategorieId;
        }

        if ((new ValueCheck())->hasValue($this->kontaktId)) {
            $update->kontaktId = $this->kontaktId;
        }

        $update->updateById($this->id);


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

        $data->save();

    }


    protected function cleanData()
    {

        $this->kosten = (new WordClean())->cleanHtml($this->kosten);
        $this->leistung = (new WordClean())->cleanHtml($this->leistung);

    }




    protected function onDelete()
    {

        $update = new AktivitaetUpdate();
        $update->isDeleted = true;
        $update->updateById($this->id);


    }


    protected function onUndoDelete()
    {

        $update = new AktivitaetUpdate();
        $update->isDeleted = false;
        $update->updateById($this->id);

    }


    public function addOption($option, $preis)
    {

        $preis = preg_replace('/[^0-9.]/', '', $preis);

        $itemOrder = null;

        $count = new OptionCount();
        $count->filter->andEqual($count->model->aktivitaetId, $this->id);
        if ($count->getCount() === 0) {
            $itemOrder = 0;
        } else {

            $reader = new OptionReader();
            $reader->filter->andEqual($reader->model->aktivitaetId, $this->id);
            $reader->addOrder($reader->model->itemOrder, SortOrder::DESCENDING);
            $reader->limit = 1;
            foreach ($reader->getData() as $optionRow) {
                $itemOrder = $optionRow->itemOrder;
            }

            $itemOrder++;

        }

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

        $data->itemOrder = $itemOrder;
        $data->save();

        return $this;

    }


    public function deleteOption($id)
    {

    }


}