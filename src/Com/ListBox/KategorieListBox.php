<?php

namespace LuzernTourismus\MarketingProgramm\Com\ListBox;

use LuzernTourismus\MarketingProgramm\Data\Kategorie\KategorieReader;
use LuzernTourismus\MarketingProgramm\Parameter\KategorieParameter;
use Nemundo\Admin\Com\ListBox\AdminListBox;

class KategorieListBox extends AdminListBox
{

    public $themaId;

    protected function loadContainer()
    {

        parent::loadContainer();

        $this->label = 'Kategorie';
        $this->name = (new KategorieParameter())->getParameterName();


    }


    public function getContent()
    {

        $reader = new KategorieReader();
        $reader->filter->andEqual($reader->model->isDeleted, false);

        if ($this->themaId !== null) {
            $reader->filter->andEqual($reader->model->themaId, $this->themaId);
        }

        $reader->addOrder($reader->model->kategorie);
        foreach ($reader->getData() as $kategorieRow) {
            $this->addItem($kategorieRow->id, $kategorieRow->kategorie);
        }

        return parent::getContent();

    }
}