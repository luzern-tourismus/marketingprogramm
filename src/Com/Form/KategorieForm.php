<?php

namespace LuzernTourismus\MarketingProgramm\Com\Form;

use LuzernTourismus\MarketingProgramm\Business\Kategorie\KategorieBuilder;
use LuzernTourismus\MarketingProgramm\Com\ListBox\ThemaListBox;
use LuzernTourismus\MarketingProgramm\Data\Kategorie\KategorieReader;
use Nemundo\Admin\Com\Form\AbstractAdminForm;
use Nemundo\Admin\Com\ListBox\AdminTextBox;

class KategorieForm extends AbstractAdminForm
{

    public $kategorieId;

    /**
     * @var AdminTextBox
     */
    private $kategorie;

    /**
     * @var ThemaListBox
     */
    private $thema;

    public function getContent()
    {

        $this->kategorie = new AdminTextBox($this);
        $this->kategorie->label = 'Kategorie';
        $this->kategorie->validation = true;

        $this->thema = new ThemaListBox($this);
        $this->thema->validation = true;

        if ($this->kategorieId!==null) {

            $kategorieRow = (new KategorieReader())->getRowById($this->kategorieId);
            $this->kategorie->value = $kategorieRow->kategorie;
            $this->thema->value=$kategorieRow->themaId;

        }



        return parent::getContent();

    }


    protected function onSubmit()
    {


        $builder = new KategorieBuilder($this->kategorieId);
        $builder->kategorie = $this->kategorie->getValue();
        $builder->themaId = $this->thema->getValue();
        $builder->build();


    }

}