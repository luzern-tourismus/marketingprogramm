<?php

namespace LuzernTourismus\MarketingProgramm\Business\Partner;

use LuzernTourismus\MarketingProgramm\Business\Base\AbstractBuilder;
use LuzernTourismus\MarketingProgramm\Data\PartnerMitarbeiter\PartnerMitarbeiter;
use LuzernTourismus\MarketingProgramm\Usergroup\PartnerUsergroup;
use Nemundo\Core\Type\Text\Text;
use Nemundo\User\Builder\UserBuilder;

class PartnerMitarbeiterBuilder extends AbstractBuilder
{

    public $partnerId;

    public $anredeId;

    public $vorname;

    public $nachname;

    public $email;


    protected function loadBuilder()
    {
        $this->type = new PartnerMitarbeiterType();
    }


    protected function onCreate()
    {

        $email = (new Text($this->email))->changeToLowercase()->getValue();

        $data = new PartnerMitarbeiter();
        $data->isDeleted = false;
        $data->anredeId = $this->anredeId;
        $data->vorname = $this->vorname;
        $data->name = $this->nachname;
        $data->email = $email;
        $data->partnerId = $this->partnerId;
        $this->id = $data->save();

        $user = new UserBuilder();
        $user->email = $email;
        $user->createUser();

        $user->addUsergroup(new PartnerUsergroup());

    }

}