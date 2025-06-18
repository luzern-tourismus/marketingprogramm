<?php

namespace LuzernTourismus\MarketingProgramm\Com\ListBox;

use LuzernTourismus\MarketingProgramm\Parameter\StatusParameter;
use LuzernTourismus\MarketingProgramm\Type\Status\AbstractStatus;
use LuzernTourismus\MarketingProgramm\Type\Status\ActiveDeletedStatus;
use LuzernTourismus\MarketingProgramm\Type\Status\ActiveStatus;
use LuzernTourismus\MarketingProgramm\Type\Status\DeletedStatus;
use Nemundo\Admin\Com\ListBox\AdminListBox;

class StatusListBox extends AdminListBox
{

    protected function loadContainer()
    {

        parent::loadContainer();
        $this->name = (new StatusParameter())->getParameterName();
        $this->emptyValueAsDefault = false;

    }

    public function getContent()
    {

        $this->label = 'Status';

        $this
            ->addStatus(new ActiveStatus())
            ->addStatus(new DeletedStatus())
            ->addStatus(new ActiveDeletedStatus());

        return parent::getContent();
    }


    private function addStatus(AbstractStatus $status)
    {

        $this->addItem($status->id, $status->status);
        return $this;

    }


}