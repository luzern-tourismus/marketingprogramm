<?php

namespace LuzernTourismus\MarketingProgramm\Com\Form;

use Nemundo\Admin\Com\Form\AbstractAdminForm;
use Nemundo\Core\Http\Url\UrlReferer;
use Nemundo\User\Com\ListBox\UserListBox;
use Nemundo\User\Data\User\UserReader;
use Nemundo\User\Login\UserLogin;

class AutoLoginForm extends AbstractAdminForm
{

    /**
     * @var UserListBox
     */
    private $user;

    public function getContent()
    {


        $this->user = new UserListBox($this);
        $this->user->submitOnChange=true;

        $this->hideSubmitButton();


        return parent::getContent();

    }


    protected function onSubmit()
    {

        $userRow = (new UserReader())->getRowById($this->user->getValue());

        $login = new UserLogin();
        $login->passwordVerification=false;
        $login->login = $userRow->login;
        $login->loginUser();

        (new UrlReferer())->redirect();

        //exit;

    }

}