<?php

namespace LuzernTourismus\MarketingProgramm\Business\Kategorie;

use LuzernTourismus\MarketingProgramm\Business\Base\AbstractBuilder;
use LuzernTourismus\MarketingProgramm\Data\Kategorie\Kategorie;
use LuzernTourismus\MarketingProgramm\Data\Kategorie\KategorieReader;
use LuzernTourismus\MarketingProgramm\Data\Kategorie\KategorieUpdate;
use LuzernTourismus\MarketingProgramm\Data\KategorieLog\KategorieLog;
use Nemundo\Core\Check\ValueCheck;

class KategorieBuilder extends AbstractBuilder
{

    public $kategorie;

    public $regionId;

    public $themaId;


    protected function loadBuilder()
    {
        $this->type = new KategorieType();
    }


    protected function onCheck()
    {

        if (!(new ValueCheck())->hasValue($this->kategorie)) {
            throw new \Exception('No Category');
        }

        if (!(new ValueCheck())->hasValue($this->themaId)) {
            throw new \Exception('No Thema Id');
        }

    }


    protected function onCreate()
    {

        $data = new Kategorie();
        $data->isDeleted = false;
        $data->kategorie = $this->kategorie;

        if ((new ValueCheck())->hasValue($this->regionId)) {
            $data->regionId = $this->regionId;
        }

        $data->themaId = $this->themaId;
        $this->id = $data->save();

        $kategorieRow = (new KategorieReader())->getRowById($this->id);

        $data = new KategorieLog();
        $data->logId = $this->logId;
        $data->kategorieId = $this->id;
        $data->kategorieHasChanged = true;
        $data->kategorieNew = $kategorieRow->kategorie;
        $data->themaHasChanged = true;
        $data->themaNewId = $kategorieRow->themaId;

        if ((new ValueCheck())->hasValue($this->regionId)) {
            $data->regionNewId = $this->regionId;
            $data->regionHasChanged = true;
        } else {
            $data->regionHasChanged = false;
        }


        $data->save();


    }


    protected function onUpdate()
    {

        $kategorieOldRow = (new KategorieReader())->getRowById($this->id);

        $update = new KategorieUpdate();
        $update->kategorie = $this->kategorie;

        if ((new ValueCheck())->hasValue($this->regionId)) {
            $update->regionId = $this->regionId;
        }
        $update->themaId = $this->themaId;
        $update->updateById($this->id);

        $kategorieNewRow = (new KategorieReader())->getRowById($this->id);

        $data = new KategorieLog();
        $data->logId = $this->logId;
        $data->kategorieId = $this->id;

        if ($kategorieNewRow->kategorie !== $kategorieOldRow->kategorie) {
            $data->kategorieHasChanged = true;
            $data->kategorieOld = $kategorieOldRow->kategorie;
            $data->kategorieNew = $kategorieNewRow->kategorie;
        } else {
            $data->kategorieHasChanged = false;
        }

        if ($kategorieNewRow->regionId !== $kategorieOldRow->regionId) {
            $data->regionHasChanged = true;
            $data->regionOldId = $kategorieOldRow->regionId;
            $data->regionNewId = $kategorieNewRow->regionId;

        } else {
            $data->regionHasChanged = false;
        }

        if ($kategorieNewRow->themaId != $kategorieOldRow->themaId) {
            $data->themaHasChanged = true;
            $data->themaOldId = $kategorieOldRow->themaId;
            $data->themaNewId = $kategorieNewRow->themaId;
        } else {
            $data->themaHasChanged = false;
        }

        $data->save();


    }


    protected function onDelete()
    {

        $update = new KategorieUpdate();
        $update->isDeleted = true;
        $update->updateById($this->id);

        $data = new KategorieLog();
        $data->logId = $this->logId;
        $data->kategorieId = $this->id;
        $data->kategorieHasChanged = false;
        $data->regionHasChanged = false;
        $data->themaHasChanged = false;
        $data->save();

    }


    protected function onUndoDelete()
    {

        $update = new KategorieUpdate();
        $update->isDeleted = false;
        $update->updateById($this->id);

        $data = new KategorieLog();
        $data->logId = $this->logId;
        $data->kategorieId = $this->id;
        $data->kategorieHasChanged = false;
        $data->regionHasChanged = false;
        $data->themaHasChanged = false;
        $data->save();

    }

}