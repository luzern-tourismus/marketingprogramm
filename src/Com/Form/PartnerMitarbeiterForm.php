<?php

namespace LuzernTourismus\MarketingProgramm\Com\Form;

use LuzernTourismus\MarketingProgramm\Business\Partner\PartnerBuilder;
use LuzernTourismus\MarketingProgramm\Business\Partner\PartnerMitarbeiterBuilder;
use LuzernTourismus\MarketingProgramm\Data\Partner\PartnerModel;
use LuzernTourismus\MarketingProgramm\Data\PartnerMitarbeiter\PartnerMitarbeiterModel;
use Nemundo\Admin\Com\Form\AbstractAdminForm;
use Nemundo\Admin\Com\ListBox\AdminTextBox;
use Nemundo\Core\Validation\ValidationType;

class PartnerMitarbeiterForm extends AbstractAdminForm
{

    public $partnerId;

    /**
     * @var AdminTextBox
     */
    private $vorname;

    /**
     * @var AdminTextBox
     */
    private $nachname;

    /**
     * @var AdminTextBox
     */
    private $email;

    public function getContent()
    {

        $model = new PartnerMitarbeiterModel();

        $this->vorname = new AdminTextBox($this);
        $this->vorname->label = $model->vorname->label;
        $this->vorname->validation = true;

        $this->nachname = new AdminTextBox($this);
        $this->nachname->label = $model->name->label;
        $this->nachname->validation = true;

        $this->email = new AdminTextBox($this);
        $this->email->label = $model->email->label;
        $this->email->validation = true;
        $this->email->validationType = ValidationType::IS_EMAIL;

        return parent::getContent();

    }


    protected function onSubmit()
    {

        $builder = new PartnerMitarbeiterBuilder();
        $builder->vorname = $this->vorname->getValue();
        $builder->nachname = $this->nachname->getValue();
        $builder->email = $this->email->getValue();
        $builder->partnerId= $this->partnerId;
        $builder->build();

    }

}