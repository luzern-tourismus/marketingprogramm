<?php

namespace LuzernTourismus\MarketingProgramm\Com\Form;

use LuzernTourismus\MarketingProgramm\Business\Kategorie\KategorieBuilder;
use LuzernTourismus\MarketingProgramm\Com\ListBox\RegionListBox;
use LuzernTourismus\MarketingProgramm\Com\ListBox\ThemaListBox;
use LuzernTourismus\MarketingProgramm\Data\Kategorie\KategorieReader;
use Nemundo\Admin\Com\Form\AbstractAdminEditForm;
use Nemundo\Admin\Com\Form\AbstractAdminForm;
use Nemundo\Admin\Com\ListBox\AdminTextBox;

class KategorieForm extends AbstractAdminEditForm
{

    //public $kategorieId;

    /**
     * @var AdminTextBox
     */
    private $kategorie;

    /**
     * @var RegionListBox
     */
    private $region;

    /**
     * @var ThemaListBox
     */
    private $thema;

    public function getContent()
    {

        $this->kategorie = new AdminTextBox($this);
        $this->kategorie->label = 'Kategorie';
        $this->kategorie->validation = true;

        $this->region = new RegionListBox($this);

        $this->thema = new ThemaListBox($this);
        $this->thema->validation = true;

        /*if ($this->kategorieId!==null) {

            $kategorieRow = (new KategorieReader())->getRowById($this->kategorieId);
            $this->kategorie->value = $kategorieRow->kategorie;
            $this->thema->value=$kategorieRow->themaId;

        }*/


        return parent::getContent();

    }


    protected function loadUpdateForm()
    {

        $kategorieRow = (new KategorieReader())->getRowById($this->dataId);
        $this->kategorie->value = $kategorieRow->kategorie;
        $this->region->value = $kategorieRow->regionId;
        $this->thema->value=$kategorieRow->themaId;

    }


    protected function onSave()
    {


        $builder = new KategorieBuilder($this->dataId);
        $builder->kategorie = $this->kategorie->getValue();
        $builder->regionId = $this->region->getValue();
        $builder->themaId = $this->thema->getValue();
        $builder->build();


    }

}