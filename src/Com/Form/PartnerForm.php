<?php

namespace LuzernTourismus\MarketingProgramm\Com\Form;

use LuzernTourismus\MarketingProgramm\Business\Partner\PartnerBuilder;
use LuzernTourismus\MarketingProgramm\Data\Partner\PartnerModel;
use LuzernTourismus\MarketingProgramm\Data\Partner\PartnerReader;
use Nemundo\Admin\Com\Form\AbstractAdminForm;
use Nemundo\Admin\Com\ListBox\AdminTextBox;

class PartnerForm extends AbstractAdminForm
{

    public $partnerId;

    /**
     * @var AdminTextBox
     */
    private $firma;

    public function getContent()
    {

        $model = new PartnerModel();

        $this->firma = new AdminTextBox($this);
        $this->firma->label = $model->firma->label;
        $this->firma->validation = true;

        if ($this->partnerId!==null) {

            $partnerRow = (new PartnerReader())->getRowById($this->partnerId);
            $this->firma->value = $partnerRow->firma;

        }

        return parent::getContent();

    }


    protected function onSubmit()
    {

        $builder = new PartnerBuilder($this->partnerId);
        $builder->firma = $this->firma->getValue();
        $builder->build();

    }

}