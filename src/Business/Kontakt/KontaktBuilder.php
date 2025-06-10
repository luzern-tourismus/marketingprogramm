<?php

namespace LuzernTourismus\MarketingProgramm\Business\Kontakt;

use LuzernTourismus\MarketingProgramm\Business\Base\AbstractBuilder;
use LuzernTourismus\MarketingProgramm\Data\Kategorie\KategorieUpdate;
use LuzernTourismus\MarketingProgramm\Data\Kontakt\Kontakt;
use LuzernTourismus\MarketingProgramm\Data\Kontakt\KontaktReader;
use LuzernTourismus\MarketingProgramm\Data\Kontakt\KontaktUpdate;
use LuzernTourismus\MarketingProgramm\Data\KontaktLog\KontaktLog;
use LuzernTourismus\MarketingProgramm\Usergroup\ReaderUsergroup;
use Nemundo\Core\Type\Text\Text;
use Nemundo\User\Builder\UserBuilder;

class KontaktBuilder extends AbstractBuilder
{

    public $nachname;

    public $vorname;

    public $email;

    public $telefon;


    protected function loadBuilder()
    {
        $this->type = new KontaktType();
    }


    protected function onCreate()
    {

        $email = (new Text($this->email))->changeToLowercase()->getValue();

        $data = new Kontakt();
        $data->isDeleted = false;
        $data->nachname = $this->nachname;
        $data->vorname = $this->vorname;
        $data->email = $email;
        $data->telefon = $this->telefon;
        $this->id = $data->save();

        $kontaktRow = (new KontaktReader())->getRowById($this->id);

        $data = new KontaktLog();
        $data->kontaktId = $this->id;
        $data->logId = $this->logId;
        $data->nachnameHasChanged = true;
        $data->nachnameNew = $kontaktRow->nachname;
        $data->vornameHasChanged = true;
        $data->vornameNew = $kontaktRow->vorname;
        $data->emailHasChanged = true;
        $data->emailNew = $kontaktRow->email;
        $data->telefonHasChanged = true;
        $data->telefonNew = $kontaktRow->telefon;
        $data->save();


        $user = new UserBuilder();
        $user->email = $email;
        $user->createUser();

        $user->addUsergroup(new ReaderUsergroup());

    }


    protected function onUpdate()
    {

        $kontaktOldRow = (new KontaktReader())->getRowById($this->id);

        $update = new KontaktUpdate();
        $update->isDeleted = false;
        $update->nachname = $this->nachname;
        $update->vorname = $this->vorname;
        $update->email = $this->email;
        $update->telefon = $this->telefon;
        $update->updateById($this->id);


        $kontaktNewRow = (new KontaktReader())->getRowById($this->id);

        $data = new KontaktLog();
        $data->kontaktId = $this->id;
        $data->logId = $this->logId;

        if ($kontaktNewRow->nachname !== $kontaktOldRow->nachname) {
            $data->nachnameHasChanged = true;
            $data->nachnameNew = $kontaktNewRow->nachname;
            $data->nachnameOld = $kontaktOldRow->nachname;
        } else {
            $data->nachnameHasChanged = false;
        }

        if ($kontaktNewRow->vorname !== $kontaktOldRow->vorname) {
            $data->vornameHasChanged = true;
            $data->vornameNew = $kontaktNewRow->vorname;
            $data->vornameOld = $kontaktOldRow->vorname;
        } else {
            $data->vornameHasChanged = false;
        }

        if ($kontaktNewRow->email !== $kontaktOldRow->email) {
            $data->emailHasChanged = true;
            $data->emailNew = $kontaktNewRow->email;
            $data->emailOld = $kontaktOldRow->email;
        } else {
            $data->emailHasChanged = false;
        }

        if ($kontaktNewRow->telefon !== $kontaktOldRow->telefon) {
            $data->telefonHasChanged = true;
            $data->telefonNew = $kontaktNewRow->telefon;
            $data->telefonOld = $kontaktOldRow->telefon;
        } else {
            $data->telefonHasChanged = false;
        }
        
        
        /*$data->vornameHasChanged = true;
        $data->vornameNew = $kontaktNewRow->vorname;
        $data->emailHasChanged = true;
        $data->emailNew = $kontaktNewRow->email;
        $data->telefonHasChanged = true;
        $data->telefonNew = $kontaktNewRow->telefon;*/
        $data->save();


    }


    protected function onDelete()
    {

        $update = new KategorieUpdate();
        $update->isDeleted = true;
        $update->updateById($this->id);

    }


    protected function onUndoDelete()
    {

        $update = new KategorieUpdate();
        $update->isDeleted = false;
        $update->updateById($this->id);

    }


}