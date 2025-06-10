<?php

namespace LuzernTourismus\MarketingProgramm\Business\Kategorie;

use LuzernTourismus\MarketingProgramm\Business\Base\AbstractBuilder;
use LuzernTourismus\MarketingProgramm\ChangeLog\Operation\DeleteOperation;
use LuzernTourismus\MarketingProgramm\Data\Kategorie\Kategorie;
use LuzernTourismus\MarketingProgramm\Data\Kategorie\KategorieReader;
use LuzernTourismus\MarketingProgramm\Data\Kategorie\KategorieUpdate;
use LuzernTourismus\MarketingProgramm\Data\KategorieLog\KategorieLog;
use Nemundo\Core\Check\ValueCheck;

class KategorieBuilder extends AbstractBuilder
{

    public $kategorie;

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

        //$kategorieOldRow = (new KategorieReader())->ge

        $data = new Kategorie();
        $data->isDeleted = false;
        $data->kategorie = $this->kategorie;
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
        $data->save();


    }


    protected function onUpdate()
    {

        $kategorieOldRow = (new KategorieReader())->getRowById($this->id);

        $update = new KategorieUpdate();
        $update->kategorie = $this->kategorie;
        $update->themaId = $this->themaId;
        $update->updateById($this->id);

        $kategorieRow = (new KategorieReader())->getRowById($this->id);

        $data = new KategorieLog();
        $data->logId = $this->logId;
        $data->kategorieId = $this->id;

        if ($kategorieRow->kategorie != $kategorieOldRow->kategorie) {
            $data->kategorieHasChanged = true;
            $data->kategorieOld = $kategorieOldRow->kategorie;
            $data->kategorieNew = $kategorieRow->kategorie;
        } else {
            $data->kategorieHasChanged = false;
        }

        if ($kategorieRow->themaId != $kategorieOldRow->themaId) {
            $data->themaHasChanged = true;
            $data->themaOldId = $kategorieOldRow->themaId;
            $data->themaNewId = $kategorieRow->themaId;
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
        $data->themaHasChanged = false;
        $data->save();

    }

}