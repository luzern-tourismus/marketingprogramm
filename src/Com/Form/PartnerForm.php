<?php

namespace LuzernTourismus\MarketingProgramm\Com\Form;

use LuzernTourismus\MarketingProgramm\Business\Partner\PartnerBuilder;
use LuzernTourismus\MarketingProgramm\Com\ListBox\PartnerMitarbeiterListBox;
use LuzernTourismus\MarketingProgramm\Data\Partner\PartnerModel;
use LuzernTourismus\MarketingProgramm\Data\Partner\PartnerReader;
use LuzernTourismus\MarketingProgramm\Reader\Partner\PartnerDataModel;
use Nemundo\Admin\Com\Form\AbstractAdminEditForm;
use Nemundo\Admin\Com\ListBox\AdminTextBox;
use Nemundo\Core\Type\Text\Text;

class PartnerForm extends AbstractAdminEditForm
{

    //public $partnerId;

    /**
     * @var AdminTextBox
     */
    private $firma;

    /**
     * @var AdminTextBox
     */
    private $strasse;

    /**
     * @var AdminTextBox
     */
    private $plz;

    /**
     * @var AdminTextBox
     */
    private $ort;

    /**
     * @var PartnerMitarbeiterListBox
     */
    private $mitarbeiter;

    public function getContent()
    {

        $model = new PartnerDataModel();

        $this->firma = new AdminTextBox($this);
        $this->firma->label = $model->firma->label;
        $this->firma->validation = true;

        $this->strasse = new AdminTextBox($this);
        $this->strasse->label = $model->strasse->label;

        $this->plz = new AdminTextBox($this);
        $this->plz->label = $model->plz->label;

        $this->ort = new AdminTextBox($this);
        $this->ort->label = $model->ort->label;

        $this->mitarbeiter = new PartnerMitarbeiterListBox($this);
        $this->mitarbeiter->label = $model->mitarbeiter->label;
        $this->mitarbeiter->partnerId=$this->dataId;

        /*if ($this->partnerId!==null) {

            $partnerRow = (new PartnerReader())->getRowById($this->partnerId);
            $this->firma->value = $partnerRow->firma;

        }*/

        return parent::getContent();

    }


    protected function loadUpdateForm()
    {

        $partnerRow = (new PartnerReader())->getRowById($this->dataId);

        $this->firma->value = $partnerRow->firma;
        $this->strasse->value = $partnerRow->strasse;
        $this->plz->value = $partnerRow->plz;
        $this->ort->value = $partnerRow->ort;
        $this->mitarbeiter->value = $partnerRow->mitarbeiterId;

    }


    protected function onSave()
    {

        $builder = new PartnerBuilder($this->dataId);
        $builder->firma = $this->firma->getValue();
        $builder->strasse = $this->strasse->getValue();

        if ((new Text($this->plz->getValue()))->isNumber()) {
            $builder->plz = $this->plz->getValue();
        } else {
            $builder->plz = 0;
        }
        $builder->ort = $this->ort->getValue();
        $builder->mitarbeiterId = $this->mitarbeiter->getValue();
        $builder->build();

    }

}