<?php

namespace LuzernTourismus\MarketingProgramm\Com\Form;

use LuzernTourismus\MarketingProgramm\Business\Kontakt\KontaktBuilder;
use LuzernTourismus\MarketingProgramm\Data\Kontakt\KontaktModel;
use LuzernTourismus\MarketingProgramm\Data\Kontakt\KontaktReader;
use Nemundo\Admin\Com\Form\AbstractAdminForm;
use Nemundo\Admin\Com\ListBox\AdminTextBox;

class KontaktForm extends AbstractAdminForm
{


    public $kontaktId;


    /**
     * @var AdminTextBox
     */
    private $nachname;

    /**
     * @var AdminTextBox
     */
    private $vorname;

    /**
     * @var AdminTextBox
     */
    private $email;

    /**
     * @var AdminTextBox
     */
    private $telefon;


    public function getContent()
    {

        $model = new KontaktModel();

        $this->vorname = new AdminTextBox($this);
        $this->vorname->label = $model->vorname->label;
        $this->vorname->validation = true;

        $this->nachname = new AdminTextBox($this);
        $this->nachname->label = $model->nachname->label;
        $this->nachname->validation = true;

        $this->telefon = new AdminTextBox($this);
        $this->telefon->label = $model->telefon->label;

        $this->email = new AdminTextBox($this);
        $this->email->label = $model->email->label;
        $this->email->validation = true;

        if ($this->kontaktId !== null) {
            $kontaktRow = (new KontaktReader())->getRowById($this->kontaktId);
            $this->nachname->value = $kontaktRow->nachname;
            $this->vorname->value = $kontaktRow->vorname;
            $this->telefon->value = $kontaktRow->telefon;
            $this->email->value = $kontaktRow->email;
        }

        return parent::getContent();

    }


    protected function onSubmit()
    {


        $builder = new KontaktBuilder($this->kontaktId);
        $builder->nachname = $this->nachname->getValue();
        $builder->vorname = $this->vorname->getValue();
        $builder->email = $this->email->getValue();
        $builder->telefon = $this->telefon->getValue();
        $builder->build();


    }

}