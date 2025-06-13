<?php

namespace LuzernTourismus\MarketingProgramm\Com\Form;

use LuzernTourismus\MarketingProgramm\Business\Partner\PartnerBuilder;
use LuzernTourismus\MarketingProgramm\Business\Region\RegionBuilder;
use LuzernTourismus\MarketingProgramm\Data\Partner\PartnerModel;
use LuzernTourismus\MarketingProgramm\Data\Partner\PartnerReader;
use LuzernTourismus\MarketingProgramm\Data\Region\RegionModel;
use LuzernTourismus\MarketingProgramm\Data\Region\RegionReader;
use Nemundo\Admin\Com\Form\AbstractAdminEditForm;
use Nemundo\Admin\Com\Form\AbstractAdminForm;
use Nemundo\Admin\Com\ListBox\AdminTextBox;

class RegionForm extends AbstractAdminEditForm
{

    /**
     * @var AdminTextBox
     */
    private $region;


    public function getContent()
    {

        $model = new RegionModel();

        $this->region = new AdminTextBox($this);
        $this->region->label = $model->region->label;
        $this->region->validation=true;

        return parent::getContent();

    }


    protected function loadUpdateForm()
    {

        $partnerRow = (new RegionReader())->getRowById($this->dataId);
        $this->region->value = $partnerRow->region;

    }




    protected function onSave()
    {

        $builder = new RegionBuilder($this->dataId);
        $builder->region = $this->region->getValue();
        $builder->build();

    }

}